$(document).ready(function(){
	alert("hey");
		$('.name').click(function(){
			var $blast_id = $(this).attr("id");
			alert($blast_id);
			
			var url = "pop-up.ctp?blast_id="+$blast_id;
			var windowName = "Campaign Preview";
			var windowSize = "width=50, height=50"; //, scrollbars=yes";
			
			window.open(url, windowName, windowSize);
			
			event.preventDefault();
		});
});
