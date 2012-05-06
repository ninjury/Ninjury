$.ajaxSetup ({  
    cache: false  
});  
function aggregate_trends(form_id){
	
	var sdate = $(form_id + ' #start_date').val();
	var edate = $(form_id + ' #end_date').val();
	var s1 = $(form_id + ' #selectmenu3').val();
	var s2 = $(form_id + ' #selectmenu4').val();
	var s3 = $(form_id + ' #selectmenu5').val();
	var s4 = $(form_id + ' #selectmenu6').val();
	
	
	$.post($(form_id).attr('action'), {start_date: sdate, end_date: edate, selectmenu3: s1, 
		selectmenu4: s2, selectmenu5: s3, selectmenu6: s4}, function(response){
			
	
	var loadUrl = 