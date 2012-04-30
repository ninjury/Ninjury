alert("ajax loaded");

$.ajaxSetup ({  
    cache: false  
});  
var ajax_load = "<img src='img/load.gif' alt='loading...' />";  

//  campaigns_sent
$function campaigns_sent(page){  
	alert("campaings_sent called");
	var loadUrl = "index/campaigns.php/sent/" + page;  
    $("#result").html(ajax_load).load(loadUrl);  
}

