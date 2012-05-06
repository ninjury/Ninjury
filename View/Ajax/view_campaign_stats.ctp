<div data-role="page" data-theme="a" id="preview dialog">
	<div data-role="header" id="preview_dialog_header">
		<div class="close" >
			<a id = "close-dialog" href="#" data-rel = "back"> X </a>
		</div>
		<center> <p style = "font-size: 1em; margin: 0; margin-bottom: 10px;" >  Campaign Statistics for <?php echo('"' . $name . '"'); ?></p> </center> 
	
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
					users who opted out:
				</h3>
				<h3>
					users who reported spam:
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