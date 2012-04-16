<?php
/**
 * Login/Logout controller.
 *
 * This file will authenticate and then redirect the user.
 */

class AuthController extends AppController {

/**
 * This controller does not use a model, though it should if it had access
 * to a database and not API calls.
 *
 * @var array
 */
	public $uses = array();

/**
 * Check for a valid user and set up access to further pages.
 */
	public function login() {
		$this->set('title_for_layout', Inflector::humanize('reports'));
		$this->render('/Pages/reports');
		
		// Everything below this line would be useful if we could tell who was
		// a valid user and who wasn't.

		//if(!$this->request->is('post')) $this->redirect('/');
		
		//$username = $this->request->data('username');
		//$password = $this->request->data('password');

		//if ($username == null || $password == null) $this->redirect('/');

		// Put validation here
		// Put appropriate render here
	}

/**
 * Remove user info from session and return to index.
 */
	public function logout() {
		// Put remove code here

		$this->redirect('/', 303);
	}

}
