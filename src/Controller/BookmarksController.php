<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Bookmarks Controller
 *
 * @property App\Model\Table\BookmarksTable $Bookmarks
 */
class BookmarksController extends AppController {

	public function initialize() {
		parent::initialize();
		$this->Crud
			->listener('relatedModels')
			->relatedModels(['Tags'], $this->request->action);

		$this->Auth->config('authorize.Bookmarks', ['className' => 'App\Auth\BookmarksAuthorize']);
	}

	public function index() {
		$this->paginate['conditions'] = ['Bookmarks.user_id' => $this->Auth->user('id')];
		return $this->Crud->execute();
	}

	public function add() {
		$this->Crud->on('beforeSave', function($e) {
			$e->subject->entity->user_id = $this->Auth->user('id');
		});
		return $this->Crud->execute();
	}

}
