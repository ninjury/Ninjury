<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style1');
		echo $this->Html->css('jquery.mobile.datebox.css');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->script('jquery.js');
		echo $this->Html->script('jquery_mobile.js');
		echo $this->Html->script('campaigns.js');
		echo $this->fetch('script');

		echo $this->Html->script('sailthrutheme.js');
	?>
</head>
<body>
	<div id="container">
		<div id="content">
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
</body>
</html>
