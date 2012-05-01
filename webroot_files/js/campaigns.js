$.ajaxSetup ({  
    cache: false  
});  
var ajax_load = "<img src='img/load.gif' alt='loading...' />";  

//  campaigns_sent
function campaigns_sent(page){
	var loadUrl = "index/campaigns.php/sent/" + page;  
    $("#campaigns_sent").html(ajax_load).load(loadUrl);  
}

