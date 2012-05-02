<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	<title><?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style1');
		echo $this->Html->css('jquery.mobile.datebox.css');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->script('jquery.js');
		echo $this->Html->script('jquery_mobile.js');
		echo $this->fetch('script');

		echo $this->Html->script('sailthrutheme.js');
	?>
</head>
<body style="background-color:#00CCED; min-height:100%;">
	<div id="container">
		<div id="content">
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
</body>
</html>
