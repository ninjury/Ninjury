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
        <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('style1');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->script('jquery.js');
		echo $this->Html->script('jquery_mobile.js');
		echo $this->Html->script('swipe_mod.js');
		echo $this->fetch('script');
	?>

	<!-- Menu Javascript //-->
	<script>
	$(document).ready(function() {
		// slider
		var slider = new Swipe(document.getElementById('slider'), {
		    elementsShown: 3,
		    callback: function(e, pos) {
		        var i = bullets.length;
		        while (i--) {
		            bullets[i].className = ' ';
		        }
		        bullets[pos].className = 'on';
		    }
		});
	
		// url bar hiding
		(function() {
		    var win = window,
		    doc = win.document;
	
		    // If there's a hash, or addEventListener is undefined, stop here
		    if ( !location.hash || !win.addEventListener ) {
		        //scroll to 1
		        window.scrollTo( 0, 1 );
		        var scrollTop = 1,
	
		        //reset to 0 on bodyready, if needed
		        bodycheck = setInterval(function(){
		            if( doc.body ){
		                clearInterval( bodycheck );
		                scrollTop = "scrollTop" in doc.body ? doc.body.scrollTop : 1;
		                win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
		            } 
		        }, 15 );
	
		        if (win.addEventListener) {
		            win.addEventListener("load", function(){
		                setTimeout(function(){
		                    //reset to hide addr bar at onload
		                    win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
		                }, 0);
		            }, false );
		        }
		    }
		})();
	});
	</script>
</head>
<body>
	<div id="container">
		<div id="content">

			<?php //echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
</body>
</html>
