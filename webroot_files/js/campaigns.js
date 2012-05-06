$.ajaxSetup ({  
    cache: false  
});  
var ajax_load = "<img class='campaignsLoader' src='/mobile/img/ajax-loader1.gif' alt='Loading' />";  


function campaigns_sent(page){
	campaigns_ajax_helper(page,"#campaigns_sent","/mobile/ajax/campaigns/sent/");
}

function campaigns_scheduled(page){
	campaigns_ajax_helper(page,"#campaigns_scheduled","/mobile/ajax/campaigns/scheduled/");
}

function campaigns_in_progress(page){
	campaigns_ajax_helper(page,"#campaigns_in_progress","/mobile/ajax/campaigns/in_progress/");
}

function view_blast_preview(blastId){
	var loadUrl = "index/ajax/campaigns/info/" + blastId;
		$get(loadUrl, {language: "php", version: 5}, function(responseText){
			
			});
}

function checkBeforeLoad(id,loadFunction)
{
	if(!$(id).hasClass('loaded'))
	{
		loadFunction();
	}
}

function campaigns_ajax_helper(page,id,url)
{
	if (page == null){
		page = 1;
	}
	var loadUrl = url + page;  

	$(id).html(ajax_load);  
	$.get(loadUrl, {language: "php", version: 5}, function(responseText){ $(id).html(responseText); setStyle(); $(id).addClass("loaded");},"html");
}

function campaigns_delete(blast, name, page, type){
	if (blast == null){
		return;	
	}
	var answer = confirm("Delete campaign" + "'" + name + "'?");
	if (answer){
		var loadUrl = "/mobile/ajax/campaigns/delete/" + blast;
		$.get(loadUrl, function(result){
   			if (type == 'scheduled'){
   				campaigns_scheduled(page);
   			} else if (type == 'in_progress'){
   				campaigns_in_progress(page);
   			}
  		});
	}
}

$(document).on("expand","#collapsible_in_progress", function() {checkBeforeLoad('#campaigns_in_progress',campaigns_in_progress);} );
$(document).on('expand',"#collapsible_sent", function() {checkBeforeLoad('#campaigns_sent',campaigns_sent);} );
$(document).on('expand',"#collapsible_scheduled",function() {checkBeforeLoad('#campaigns_scheduled',campaigns_scheduled);} );
