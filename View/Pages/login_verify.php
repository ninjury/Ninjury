<?php
/**
 * Posted to by login page (login.ctp)
 *
 * takes input as $username and $password
 * checks against XSRF by checking hidden field for sessionId
 *
 * verifies $username and $password were input
 * does not check their validity
 * forwards user to reports.ctp
 */

	if(isset($_POST['submit'])) {
		$sessionId = session_id();
		if($sessionId!=$_POST['sid']){
			exit('Invalid login attempt detected.');
		}
		if(!isset($_POST['username']) || !isset($_POST['password'])) {
			// Should send them back to login page with a nicely formatted error message
			exit("Please fill in all fields.");
		}
		$username = isset($_POST['username']) ? trim($_POST['username']) : '';
		$password = isset($_POST['password']) ? sha1(trim($_POST['password'])) : '';

		//verify username and password in backend

		$this->redirect('reports');
	}
?>
