$.ajaxSetup ({  
    cache: false  
});  
var ajax_load = "<img src='/mobile/img/ajax-loader1.gif' alt='Loading' />";  


function campaigns_sent(page){
	if (page == null){
		page = 1;
	}
	var loadUrl = "/mobile/ajax/campaigns/sent/" + page;  

    $("#campaigns_sent").html(ajax_load);  
        $.get(loadUrl, {language: "php", version: 5}, function(responseText){ $("#campaigns_sent").html(responseText); },"html");  
}

function campaigns_scheduled(page){
	if (page == null){
		page = 1;
	}
	var loadUrl = "/mobile/ajax/campaigns/scheduled/" + page;   

    $("#campaigns_sent").html(ajax_load);  
        $.get(loadUrl, {language: "php", version: 5}, function(responseText){ $("#campaigns_scheduled").html(responseText); },"html");  
}

function campaigns_in_progress(page){
	if (page == null){
		page = 1;
	}
	var loadUrl = "/mobile/ajax/campaigns/in_progress/" + page;  

    $("#campaigns_sent").html(ajax_load);  
        $.get(loadUrl, {language: "php", version: 5}, function(responseText){ $("#campaigns_in_progress").html(responseText); },"html");  
}

function view_blast_preview(blastId){
	var loadUrl = "index/ajax/campaigns/info/" + blastId;
		$get(loadUrl, {language: "php", version: 5}, function(responseText){
			
			});
}

function campaigns_delete(blast, name, page, type){
	if (blast == null){
		return;	
	}
	var answer = confirm("Delete campaign" + "'" + name + "'?");
	if (answer){
		var loadUrl = "/mobile/ajax/campaigns/delete/" + blast;
		$.get(loadUrl, function(result){
   			//if (type == 'scheduled'){
   				campaigns_scheduled(page);
   			//} else {
   			//	campaigns_in_progress(page);
   			//}
  		});
	}
}



