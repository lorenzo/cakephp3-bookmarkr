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

	public $paginate = [
		'contain' => ['Tags']
	];

	public function initialize() {
		parent::initialize();
		$this->Crud->on('beforeFind', function($e) {
			$e->subject->query->contain('Tags');
		});

		$this->Crud->on('beforePaginate', function($e) {
			$this->paginate['conditions'] = ['Bookmarks.user_id' => $this->Auth->user('id')];
		});

		$this->Auth->config('authorize.Bookmarks', ['className' => 'App\Auth\BookmarksAuthorize']);
	}

	public function add() {
		$this->Crud->on('beforeSave', function($e) {
			$e->subject->entity->user_id = $this->Auth->user('id');
		});
		return $this->Crud->execute();
	}

	public function tags($tag) {
		$this->paginate += [
			'finder' => 'tagged',
			'tag' => $tag
		];
		return $this->Crud->execute('index');
	}

}
