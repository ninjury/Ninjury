<div data-role="page" data-theme="a" id="preview dialog">
	<div data-role="header" id="preview_dialog_header">
		<div class="close" >
			<a id = "close-dialog" href="#" data-rel = "back"> X </a>
		</div>
		<center> <p style = "font-size: 1.5em; margin: 0; margin-bottom: 10px;" >  Campaign Statistics for <?php echo('"' . $name . '"'); ?></p> </center> 
	
	</div>

	<div data-role="content">
		<div id = 'view_campaign_stats_div' >
			<div id = 'view_campaign_stats_div_left' >
				<h3>
					total number of users:
				</h3>	
				<h3>
					estimated opens:
				</h3>
				<h3>
					total number of clicks: 
				</h3>
				<h3>	
					total revenue (in cents):
				</h3>
				<h3>
					number of users who opted out:
				</h3>
				<h3>
					number of users who reported spam:
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