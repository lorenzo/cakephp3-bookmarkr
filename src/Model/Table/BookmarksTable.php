<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bookmarks Model
 */
class BookmarksTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('bookmarks');
		$this->displayField('title');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Users', [
			'foreignKey' => 'user_id',
		]);
		$this->belongsToMany('Tags', [
			'foreignKey' => 'bookmark_id',
			'targetForeignKey' => 'tag_id',
			'joinTable' => 'bookmarks_tags',
		]);
	}

/**
 * Default validation rules.
 *
 * @param \Cake\Validation\Validator $validator
 * @return \Cake\Validation\Validator
 */
	public function validationDefault(Validator $validator) {
		$validator
			->add('id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('id', 'create')
			->add('user_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('user_id', 'create')
			->notEmpty('user_id')
			->validatePresence('title', 'create')
			->notEmpty('title')
			->validatePresence('description', 'create')
			->notEmpty('description')
			->validatePresence('url', 'create')
			->notEmpty('url');

		return $validator;
	}

}
