$.ajaxSetup ({  
    cache: false  
});  
var ajax_load = "Loading";  

//  campaigns_sent
function campaigns_sent(page){
	var loadUrl = "index/ajax/campaigns/sent/" + page;  
	//alert(loadUrl);
    //$("#campaigns_sent").html(ajax_load).load(loadUrl); 

    $("#campaigns_sent").html(ajax_load);  
        $.get(loadUrl, {language: "php", version: 5}, function(responseText){ $("#campaigns_sent").html(responseText); },"html");  
}

