<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookmarks Controller
 *
 * @property App\Model\Table\BookmarksTable $Bookmarks
 */
class BookmarksController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Users']
		];
		$this->set('bookmarks', $this->paginate($this->Bookmarks));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$bookmark = $this->Bookmarks->get($id, [
			'contain' => ['Users', 'Tags', 'BookmarksTags']
		]);
		$this->set('bookmark', $bookmark);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$bookmark = $this->Bookmarks->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Bookmarks->save($bookmark)) {
				$this->Flash->success('The bookmark has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The bookmark could not be saved. Please, try again.');
			}
		}
		$users = $this->Bookmarks->Users->find('list');
		$tags = $this->Bookmarks->Tags->find('list');
		$this->set(compact('bookmark', 'users', 'tags'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$bookmark = $this->Bookmarks->get($id, [
			'contain' => ['Tags']
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->data);
			if ($this->Bookmarks->save($bookmark)) {
				$this->Flash->success('The bookmark has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The bookmark could not be saved. Please, try again.');
			}
		}
		$users = $this->Bookmarks->Users->find('list');
		$tags = $this->Bookmarks->Tags->find('list');
		$this->set(compact('bookmark', 'users', 'tags'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$bookmark = $this->Bookmarks->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Bookmarks->delete($bookmark)) {
			$this->Flash->success('The bookmark has been deleted.');
		} else {
			$this->Flash->error('The bookmark could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
