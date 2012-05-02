$.ajaxSetup ({  
    cache: false  
});  
var ajax_load = "<img src='img/ajax-loader1.gif' alt='Loading' />";  

//  campaigns_sent
function campaigns_sent(page){
	//alert("campaigns_sent " + page);
	if (page == null){
		page = 1;
	}
	var loadUrl = "index/ajax/campaigns/sent/" + page;  
	//alert(loadUrl);
    //$("#campaigns_sent").html(ajax_load).load(loadUrl); 

    $("#campaigns_sent").html(ajax_load);  
        $.get(loadUrl, {language: "php", version: 5}, function(responseText){ $("#campaigns_sent").html(responseText); },"html");  
}

function campaigns_scheduled(page){
	if (page == null){
		page = 1;
	}
	var loadUrl = "index/ajax/campaigns/scheduled/" + page;   

    $("#campaigns_sent").html(ajax_load);  
        $.get(loadUrl, {language: "php", version: 5}, function(responseText){ $("#campaigns_scheduled").html(responseText); },"html");  
}

function campaigns_in_progress(page){
	if (page == null){
		page = 1;
	}
	var loadUrl = "index/ajax/campaigns/in_progress/" + page;  

    $("#campaigns_sent").html(ajax_load);  
        $.get(loadUrl, {language: "php", version: 5}, function(responseText){ $("#campaigns_in_progress").html(responseText); },"html");  
}
function view_blast_preview(blastId){
	var loadUrl = "index/ajax/campaigns/info/" + blastId;
		$get(loadUrl, {language: "php", version: 5}, function(responseText){
			
			});
}

