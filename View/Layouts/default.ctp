<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	<title><?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->meta('icon');

        $page = strtolower($title_for_layout);

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('style1');
		echo $this->Html->css('jquery.mobile.datebox.css');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->script('jquery.js');
		echo $this->Html->script('jquery_mobile.js');
		echo $this->Html->script('swipe_mod.js');
		echo $this->Html->script('highcharts.js');
		echo $this->Html->script('jquery.mobile.datebox.js');
		echo $this->Html->script('jquery.pjax.js');
		echo $this->Html->script('sailthru.js');
		echo $this->Html->script('campaigns.js');
		echo $this->Html->script('sailthrutheme.js');
		echo $this->fetch('script');
	?>
	
</head>
<body>
	<div id="container">
		<div id="content">
			<div data-role="page" id="<?php echo $page; ?>_page" data-theme="a">
				<?php echo $this->element('header', array('page' => $page)); ?>
				<div class='loader' ><img src='/mobile/img/ajax-loader1.gif'></div>
				<div id="page_content" data-role="content">
				    <?php echo $this->fetch('content'); ?>
				</div>
			    <?php echo $this->element('footer'); ?>
			</div>
		</div>
	</div>
</body>
</html>
