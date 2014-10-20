<?php

namespace App\Auth;

use Cake\Network\Request;

class BookmarksAuthorize {

	protected $registry;

	public function __construct($registry) {
		$this->registry = $registry;
	}

	public function authorize($user, Request $request) {
		$action = $request->action;

		// The add and index actions are always allowed.
		if (in_array($action, ['index', 'add', 'tags'])) {
			return true;
		}

		// All other actions require an id.
		if (empty($request->params['pass'])) {
			return false;
		}

		// Check that the bookmark belongs to the current user.
		$id = $request->params['pass'][0];
		$bookmark = $this->registry->getController()->Bookmarks->get($id);
		if ($bookmark->user_id == $user['id']) {
			return true;
		}
	}

}
