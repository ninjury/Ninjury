		<div id="header">
            		<div data-theme="a" data-role="header" data-id="header">
                		<div id="header_panel">
                    			<a href="#"><?php echo $this->Html->image('sailthru_logo.png', array('id' => 'header_logo')); ?></a>
                    			<div id="header_logout_panel">
                       				<a href="#">Logout</a>
                    			</div>
                		</div>
            		</div>
			<?php echo $this->element('menu', array('page' => $page)); ?>
		</div>
