<div data-role="page" data-theme="a" id="preview dialog">
	<div data-role="header" id="preview_dialog_header">
		<div class="close">
			<a id="close-dialog" href="#" onclick="$('.ui-dialog').dialog('close');"> X </a>
		</div>
		<center> 
			<p style = "font-size: 2em; margin: 0;" >  Campaign Statistics </p>
			<p style = "font-size: 2em; margin: 0; margin-bottom: 10px;" > <?php echo('"' . $name . '"'); ?> </p> 
		</center> 
	
	</div>

	<div data-role="content">
		<div id = 'view_campaign_stats_div' >
			<div id = 'view_campaign_stats_div_left' >
				<h3>
					total users:
				</h3>	
				<h3>
					est opens:
				</h3>
				<h3>
					total clicks: 
				</h3>
				<h3>	
					revenue (in cents):
				</h3>
				<h3>
					users opted out:
				</h3>
				<h3>
					users reported spam:
				</h3>
			</div>
			<div id = 'view_campaign_stats_div_right' >
				<h3>
					<?php echo($num_users); ?>
				</h3>
				<h3>
					<?php echo($est_open_rate); ?>
				</h3>
				<h3>
					<?php echo($click_total); ?>
				</h3>
				<h3>	
					<?php echo($revenue_in_cents); ?>
				</h3>
				<h3>
					<?php echo($optout); ?>
				</h3>
				<h3>
					<?php echo($spam); ?>
				</h3>
				
		</div>

	</div>
</div>