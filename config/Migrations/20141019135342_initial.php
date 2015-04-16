<?php

use Phinx\Migration\AbstractMigration;

class Initial extends AbstractMigration {

	public function change() {
		$this->table('users')
			->addColumn('username', 'string', ['limit' => 30])
			->addColumn('password', 'string', ['limit' => 255])
			->addColumn('created', 'datetime')
			->addColumn('modified', 'datetime')
			->create();

		$this->table('bookmarks')
			->addColumn('user_id', 'integer')
			->addColumn('title', 'string', ['limit' => 50])
			->addColumn('description', 'text')
			->addColumn('url', 'text')
			->addColumn('created', 'datetime')
			->addColumn('modified', 'datetime')
			->create();

		$this->table('tags')
			->addColumn('title', 'string', ['limit' => 100])
			->addColumn('created', 'datetime')
			->addColumn('modified', 'datetime')
			->create();

		$this->table('bookmarks_tags', ['id' => false, 'primary_key' => ['bookmark_id', 'tag_id']])
			->addColumn('bookmark_id', 'integer')
			->addColumn('tag_id', 'integer')
			->addForeignKey('tag_id', 'tags', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
			->addIndex(['tag_id', 'bookmark_id'])
			->create();
	}

}
