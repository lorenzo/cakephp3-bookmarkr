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
		$this->hasMany('BookmarksTags', [
			'foreignKey' => 'bookmark_id'
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
			->notEmpty('user_id')
			->notEmpty('title')
			->notEmpty('description')
			->notEmpty('url')
			->add('url', 'valid', ['rule' => 'url']);

		return $validator;
	}

	public function findTagged(Query $query, $options) {
		return $query->matching('Tags', function($q) use ($options) {
			return $q->where(['Tags.title' => $options['tag']]);
		});
	}

	public function beforeSave($event, $entity, $options) {
		if ($entity->dirty('tag_string')) {
			$entity->tags = $this->_buildTags($entity->tag_string);
		}
	}

	protected function _buildTags($tagString) {
		$new = array_flip(array_map('trim', explode(',', $tagString)));
		$tags = $this->Tags->find()
			->where(['Tags.title IN' => array_keys($new)]);

		$out = [];
		foreach ($tags as $tag) {
			$out[] = $tag;
			unset($new[$tag->title]);
		}

		foreach ($new as $title => $index) {
			$out[] = $this->Tags->newEntity(['title' => $title]);
		}

		return $out;
	}

}
