$.ajaxSetup ({  
    cache: false  
});  

var ajax_load = "<img class='campaignsLoader' src='/mobile/img/ajax-loader1.gif' alt='Loading' />";  


function aggregate_trends(form_elt){
	
	var sdate = form_elt.elements['start_date'].value;
	var edate = form_elt.elements['end_date'].value;
	var s1 = form_elt.elements['selectmenu3'].value;
	var s2 = form_elt.elements['selectmenu4'].value;
	var s3 = form_elt.elements['selectmenu5'].value;
	var s4 = form_elt.elements['selectmenu6'].value;
	
	var hc = $("#highchartcontainer");
	hc.html(ajax_load);
	
	$.post('ajax/reports/trends', {"start_date": sdate, "end_date": edate, "selectmenu3": s1, 
		"selectmenu4": s2, "selectmenu5": s3, "selectmenu6": s4}, function(response){
			//$("#highchartcontainer").html(response);
			console.log(response);
			createChart(response);
			
		});
	return false;
		
}

