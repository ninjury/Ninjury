$.ajaxSetup ({  
    cache: false  
});  
var ajax_load = "Loading";  

//  campaigns_sent
function campaigns_sent(page){
	alert(page);
	var loadUrl = "index/campaigns.php/sent/" + page;  
    $("#campaigns_sent").html(ajax_load).load(loadUrl);  
}

