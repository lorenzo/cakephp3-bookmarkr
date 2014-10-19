<?php
namespace App\Controller;

use App\Controller\AppController;

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
			->relatedModels(['Users', 'Tags'], $this->request->action);
	}

}
