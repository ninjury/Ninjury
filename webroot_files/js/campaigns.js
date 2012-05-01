$.ajaxSetup ({  
    cache: false  
});  
var ajax_load = "Loading";  

//  campaigns_sent
function campaigns_sent(page){
	var loadUrl = "index/campaigns/sent/" + page;  
	alert(loadUrl);
    $("#campaigns_sent").html(ajax_load).load(loadUrl);  
}

