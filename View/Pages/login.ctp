    	<?php
    		//Start session to be able to include session_id as hidden field in form
    		session_start();
    		$sessionId = session_id();
    	?>
        <div data-role="page" data-theme="a" id="login_page">
            <div data-role="content">
                <div id="logo_img_div">
                    <?php echo $this->Html->image('sailthru_logo_large.png', array('id' => 'logo_img', 'alt' => 'image')); ?>
                </div>
                <div id="login_form">
			<form data-ajax="false" action="login" method="post">
				<input type = "hidden" name = 'sid' value = '<?php echo $sessionId; ?>' />
				<div class="logininput" data-role="fieldcontain">
					<fieldset data-role="controlgroup">
						<div class="loginbutton">
							<input id="username" autocorrect="off" autocapitalize="off" placeholder="Username" type="text" name="username"/>
						</div>
					</fieldset>
				</div>
				<div class="logininput" data-role="fieldcontain">
					<fieldset data-role="controlgroup">
						<div class="loginbutton">
							<input id="password" autocorrect="off" autocapitalize="off" placeholder="Password" type="password" name="password"/>
						</div>
					</fieldset>
				</div>
				<div id="loginButton">
					<input type="submit" value="LOG IN" name="submit"/>
				</div>
			</form>
		</div>
            </div>
        </div>
