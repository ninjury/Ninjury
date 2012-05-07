$.ajaxSetup ({  
    cache: false  
});
var ajax_load = "<img class='campaignsLoader' src='/mobile/img/ajax-loader1.gif' alt='Loading' />";  

function aggregate_trends(form_elt){
	var sdate = form_elt.elements['start_date'].value;
	var edate = form_elt.elements['end_date'].value;
    if((typeof sdate == 'undefined' || sdate === null || sdate === '') &&
       (typeof edate == 'undefined' || edate === null || edate === '')) {
        var d = new Date();
        var month, day, output;
        month = d.getMonth()+1;
        day = d.getDate();
        output = d.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
        edate = output;
        d = new Date(d.getTime() - (30 * 24 * 60 * 60 * 1000));
        month = d.getMonth()+1;
        day = d.getDate();
        output = d.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
        sdate = output;
    }
	var s1 = form_elt.elements['selectmenu3'].value;
	var s2 = form_elt.elements['selectmenu4'].value;
	var s3 = form_elt.elements['selectmenu5'].value;
	var s4 = form_elt.elements['selectmenu6'].value;
	
	var hc = $("#highchartcontainer");
	hc.html(ajax_load);
	
	$.post('ajax/reports/trends', {"start_date": sdate, "end_date": edate, "selectmenu3": s1, 
		"selectmenu4": s2, "selectmenu5": s3, "selectmenu6": s4}, function(response){
			console.log(response);
			createChart(response);
		}, "json");
	return false;
}

function recent_campaigns(page){

	var form_elt = document.getElementById("recent_campaigns_form");

	if (page == 'undefined'){
		page = 1;
	}

	var sdate = form_elt.elements['start_date_2'].value;
	var edate = form_elt.elements['end_date_2'].value;
	var s0 = form_elt.elements['selectmenu0'].value;
	var s1 = form_elt.elements['selectmenu1'].value;
	var s2 = form_elt.elements['selectmenu2'].value;

	sdate = (sdate == "") ? "null" : sdate;
	edate = (edate == "") ? "null" : edate;

	var insert = $("#recent_campaigns");
	insert.html(ajax_load);

	var url = "/mobile/ajax/reports/recent_campaigns/" + sdate + "/" + edate + "/" + s0 + "/" + s1 + "/" + s2 + "/" + page;
	$.get(url, {language: "php", version: 5}, function(responseText){ $(insert).html(responseText); $(insert).addClass("loaded");},"html");

	return false;
}

function checkBeforeLoad(id,loadFunction)
{
	if(!$(id).hasClass('loaded'))
	{
		loadFunction(1);
	}
}

$(document).on("expand","#collapsible_recent_campaigns", function() {checkBeforeLoad('#recent_campaigns',recent_campaigns);} );
