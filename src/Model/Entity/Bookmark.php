<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bookmark Entity.
 */
class Bookmark extends Entity {

	/**
	 * Fields that can be mass assigned using newEntity() or patchEntity().
	 *
	 * @var array
	 */
	protected $_accessible = [
		'user_id' => false,
		'title' => true,
		'description' => true,
		'url' => true,
		'user' => true,
		'tags' => true,
		'tag_string' => true
	];

	protected function _getTagString() {
		if (isset($this->_properties['tag_string'])) {
			return $this->_properties['tag_string'];
		}
		return implode(', ', collection($this->tags ?: [])->extract('title')->toArray());
	}

}
