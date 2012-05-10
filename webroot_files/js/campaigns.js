$.ajaxSetup ({  
    cache: false  
});  

//Animated loader image.
var ajax_load = "<img class='campaignsLoader' src='/mobile/img/ajax-loader1.gif' alt='Loading' />";  

// Calls the campaigns_ajax_helper function passing in the URL for retrieving Sent campaigns.
function campaigns_sent(page){
	campaigns_ajax_helper(page,"#campaigns_sent","/mobile/ajax/campaigns/sent/");
}

// Calls the campaigns_ajax_helper function passing in the URL for retrieving Scheduled campaigns.
function campaigns_scheduled(page){
	campaigns_ajax_helper(page,"#campaigns_scheduled","/mobile/ajax/campaigns/scheduled/");
}

// Calls the campaigns_ajax_helper function passing in the URL for retrieving In Progress campaigns.
function campaigns_in_progress(page){
	campaigns_ajax_helper(page,"#campaigns_in_progress","/mobile/ajax/campaigns/in_progress/");
}

//Checks whether a collapsible tab has been loaded and has the "loaded" attribute.  If not, call the given function to populate the tab.
function checkBeforeLoad(id,loadFunction)
{
	if(!$(id).hasClass('loaded'))
	{
		loadFunction();
	}
}

// Core function for making ajax calls for the Campaigns page.  Given a url, make a get request to the url appending the page number.
// Insert the HTML reponse from the server into the given HTML id on the page.
function campaigns_ajax_helper(page,id,url)
{
	if (page == null){
		page = 1;
	}
	var loadUrl = url + page;  

	$(id).html(ajax_load);  
	$.get(loadUrl, {language: "php", version: 5}, function(responseText){ $(id).html(responseText); setStyle(); $(id).addClass("loaded");},"html");
}


// Function called when a user clicks on a campaign's Delete button.  Displays a message to verify the action, then hits the URL to delete the blast and reloads the tab.
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

//These functions are triggered when a user expands a collapsed tab.  Calls the checkBeforeLoad function to check whether the tab has been loaded.
$(document).on("expand","#collapsible_in_progress", function() {checkBeforeLoad('#campaigns_in_progress',campaigns_in_progress);} );
$(document).on('expand',"#collapsible_sent", function() {checkBeforeLoad('#campaigns_sent',campaigns_sent);} );
$(document).on('expand',"#collapsible_scheduled",function() {checkBeforeLoad('#campaigns_scheduled',campaigns_scheduled);} );
