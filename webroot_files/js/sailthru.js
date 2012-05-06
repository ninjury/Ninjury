var slider;
var chart;

/********************************
	initSlider
*********************************/
function initSlider(elementId)
{
	if(typeof Swipe === 'undefined')
	{
		return;
	}

	var slider = new Swipe(document.getElementById(elementId), {
		    elementsShown: 3,
		});
	return slider;
}

/********************************
	initiPjax
*********************************/
function initPjax()
{
	if(typeof $.pjax === 'undefined')
	{
		return;
	}

	$('#slider a').pjax({container: "#page_content",fragment: "#page_content", timeout: 2000}).live('click', function() { $(".loader").show(); });
	$('#page_content').on('pjax:end', 
		function() { 
			$("#page_content").trigger('pagecreate');
			pjaxLoadInit();
			$(".loader").hide();
		});
}

/********************************
	initSlider
*********************************/
function hideUrlBar()
{
	var win = window,
	doc = win.document;

	// If there's a hash, or addEventListener is undefined, stop here
	if ( !location.hash || !win.addEventListener ) {
		//scroll to 1
		window.scrollTo( 0, 1 );
		var scrollTop = 1,

		//reset to 0 on bodyready, if needed
		bodycheck = setInterval(function(){
		    if( doc.body ){
			clearInterval( bodycheck );
			scrollTop = "scrollTop" in doc.body ? doc.body.scrollTop : 1;
			win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
		    } 
		}, 15 );

		if (win.addEventListener) {
		    win.addEventListener("load", function(){
			setTimeout(function(){
			    //reset to hide addr bar at onload
			    win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
			}, 0);
		    }, false );
		}
	}
}

function init()
{
	slider = initSlider("slider");
	initPjax();
	pjaxLoadInit();
}

function pjaxLoadInit()
{
	$("input[data-role='datebox']").click(function(){ $(this).datebox("open"); });
}


$(document).ready(function() {
		// slider
		init();
		
		// url bar hiding
		hideUrlBar();

		setStyle();

		$(window).resize(function () { 
			setStyle();
		});
});




function setStyle()
{
	var d = $(".description");
	if(d.size() > 0)
	{
		d.width(d.parent().width()-d.next().width()-6);
	}	
	var l = $('.list');
	var pwidth = l.parent().width()-4;
	if(l.size() > 0)
	{
		l.width(l.parent().width()-l.next().width()-4);
	}
}

function createChart(seriesData)
{
	if(!($("#highchartcontainer").length == 0))
	{
		var hc = $("#highchartcontainer");
		var width = hc.parent().width()*.9;
		if(width/2 < 200) {
			hc.height(width);
		} else {
			hc.width(width/2);
		}

		chart = new Highcharts.Chart({
		    chart: {
		        renderTo: 'highchartcontainer',
		        type: 'area'
		    },
		    title: {
		        text: 'Campaign Statistics'
		    },
		    xAxis: {
		        labels: {
		            formatter: function() {
		                return this.value; // clean, unformatted number for year
		            }
		        }
		    },
		    yAxis: {
		        title: {
		            text: ''
		        },
		        labels: {
		            formatter: function() {
		                return this.value / 1000 +'k';
		            }
		        }
		    },
		    tooltip: {
		        formatter: function() {
		            return this.series.name +' = <b>'+
		                Highcharts.numberFormat(this.y, 0) +'</b><br/>in '+ this.x;
		        }
		    },
		    plotOptions: {
		    	series: {
                connectNulls: true,
            },
		        area: {
		            pointStart: 1940,
		            marker: {
		                enabled: false,
		                symbol: 'circle',
		                radius: 2,
		                states: {
		                    hover: {
		                        enabled: true
		                    }
		                }
		            }
		        }
		    },
		    series: seriesData
		});
	}
}
/*
		    [{
		        name: 'Open %',
		        data: [null, null, null, null, null, 6 , 11, 32, 110, 235, 369, 640,
		            1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468, 20434, 24126,
		            27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342, 26662,
		            26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
		            24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586,
		            22380, 21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950,
		            10871, 10824, 10577, 10527, 10475, 10421, 10358, 10295, 10104 ]
		    }, {
		        name: 'PV/M %',
		        data: [
		        4238, 5221, 6129, 7089, 8339, 9399, 10538, 11643, 13092, 14478,
		        15915, 17385, 19055, 21205, 23044, 25393, 27935, 30062, 32049,
		        33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000, 37000,
		        35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
		        21000, 20000, 19000, 18000, 18000, 17000, 16000,
			5, 25, 50, 120, 150, 200, 426, 660, 869, 1060, 1605, 2471, 3322,
			null, null, null, null, null, null, null , null , null ,null]
		    } , {
		        name: 'Clicks %',
		        data: [null, null, null, null, null, null, null , null , null ,null,
		        5, 25, 50, 120, 150, 200, 426, 660, 869, 1060, 1605, 2471, 3322,
		        4238, 5221, 6129, 7089, 8339, 9399, 10538, 11643, 13092, 14478,
		        15915, 17385, 19055, 21205, 23044, 25393, 27935, 30062, 32049,
		        33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000, 37000,
		        35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
		        21000, 20000, 19000, 18000, 18000, 17000, 16000]
		    } , {
		        name: 'Bounce %',
		        data: [null, null, null, null, null, null, null , null , null ,null,
		        5, 25, 50, 120, 150, 200, 426, 660, 869, 1060, 1605, 2471, 2322,
		        1238, 3221, 7129, 9000, 8339, 9399, 9000, 8000, 7700, 7000,
		        6400, 6200, 6100, 6000, 5600, 5700, 5800, 5900, 6100,
		        6500, 6500, 6500, 7000, 8000, 10700, 10600, 11100, 11100,
		        11100, 11100, 11100, 11100, 11500, 11800, 12000, 14000, 17000,
		        21000, 20000, 26500, 30000, 40000, 42000, 41000]
		    }]
*/
