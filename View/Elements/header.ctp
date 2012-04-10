		<div id="header">
            		<div data-theme="a" data-role="header" data-id="header">
                		<div id="header_panel">
                    			<?php echo $this->Html->link($this->Html->image('sailthru_logo.png', array('id' => 'header_logo', 'data-ajax' => 'false')), '/', array('escape' => false)); ?></a>
                    			<div id="header_logout_panel">
                       				<?php echo $this->Html->link('Logout', '/logout'); ?>
                    			</div>
                		</div>
            		</div>
			<?php echo $this->element('menu', array('page' => $page)); ?>
		</div>
