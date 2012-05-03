<div data-role="page" data-theme="a" id="preview dialog">
	<div data-theme="a" data-role="header">
		<div class="close" >
			<a id = "close-dialog" href="#" data-rel = "back"> X </a>
		</div>
		<div data-theme="a" data-role="header">
			<h2>
				Campaign Statistics
			</h2>
		</div>
	</div>
	<div data-role="content">
		<div class="ui-grid-a">
			<div class="ui-block-a">
				<h5>
					<?php echo($num_users); ?>
				</h5>
			</div>
			<div class="ui-block-b">
				<h5>
					users
				</h5>
			</div>
			<div class="ui-block-a">
				<h5>
					<?php echo($est_open_rate); ?>
				</h5>
			</div>
			<div class="ui-block-b">
				<h5>
					est. open rate
				</h5>
			</div>
			<div class="ui-block-a">
				<h5>
					<?php echo($click); ?>
				</h5>
			</div>
			<div class="ui-block-b">
				<h5>
					users clicked at least 1 link
				</h5>
			</div>
			<div class="ui-block-a">
				<h5>
					<?php echo($revenue_in_cents); ?>
				</h5>
			</div>
			<div class="ui-block-b">
				<h5>
					revenue generated (in cents)
				</h5>
			</div>
		</div>
	</div>
</div>