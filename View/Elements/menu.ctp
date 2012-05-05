<div id="slider" data-role="navbar">
	<ul>
		<li><a data-ajax="false" data-pjax="true" data-icon="custom" data-iconpos="top" id="reports" <?php if($page == 'reports') echo 'class="ui-btn-active"'; ?> href="/mobile/reports">REPORTS</a></li>
		<li><a data-ajax="false" data-pjax="true" data-icon="custom" data-iconpos="top" id="campaigns" <?php if($page == 'campaigns') echo 'class="ui-btn-active"'; ?> href="/mobile/campaigns">CAMPAIGNS</a></li>
		<li><a data-ajax="false" data-pjax="true" data-icon="custom" data-iconpos="top" id="lists" <?php if($page == 'lists') echo 'class="ui-btn-active ui-state-persist"'; ?> href="/mobile/lists">LISTS</a></li>		
		<li><a data-ajax="false" data-pjax="true" data-icon="custom" data-iconpos="top" id="contact" <?php if($page == 'contact') echo 'class="ui-btn-active"'; ?> href="/mobile/contact">CONTACT</a></li>
		<li><a data-ajax="false" data-pjax="true" data-icon="custom" data-iconpos="top" id="questions" <?php if($page == 'questions') echo 'class="ui-btn-active ui-state-persist"'; ?> href="/mobile/questions">QUESTIONS</a></li>
	</ul>
</div>
