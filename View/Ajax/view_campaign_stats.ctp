<div data-role="dialog" data-theme="a" id="preview dialog" onclick="$('.ui-dialog').dialog('close');">
	<div data-role="header" id="preview_dialog_header">
		<div class="close">
			<a id="close-dialog" href="#" onclick="$('.ui-dialog').dialog('close');"> X </a>
		</div>
		<center> 
			<p style = "font-size: 1.5em; margin: 0;" >  Campaign Statistics </p>
			<p style = "font-size: 1.2em; margin: 0; margin-bottom: 10px;" > <?php echo('"' . $name . '"'); ?> </p> 
		</center> 
	
	</div>

	<div data-role="content">
		<div id = 'view_campaign_stats_div' >
				<h3>
					total users: 
					<?php echo($num_users); ?>
				</h3>	
				<h3>
					est opens: 
					<?php echo($est_open_rate); ?>
				</h3>
				<h3>
					total clicks: 
					<?php echo($click_total); ?>
				</h3>
				<h3>	
					revenue (in cents): 
					<?php echo($revenue_in_cents); ?>
				</h3>
				<h3>
					users opted out: 
					<?php echo($optout); ?>
				</h3>
				<h3>
					users reported spam: 
					<?php echo($spam); ?>
				</h3>
		</div>
	</div>
</div>
