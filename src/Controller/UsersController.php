<?php
namespace App\Controller;

use App\Controller\AppController;
use \Cake\Event\Event;

/**
 * Users Controller
 *
 * @property App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {

	public function beforeFilter(Event $event) {
		$this->Auth->allow('add');
	}

	public function login() {
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error('Your username or password is incorrect.');
		}
	}

	public function logout() {
		$this->Flash->success('You are now logged out.');
		return $this->redirect($this->Auth->logout());
	}

}
