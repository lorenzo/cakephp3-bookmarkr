<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 */
class User extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'username' => true,
		'password' => true,
		'bookmarks' => true,
	];

	protected $_hidden = [
		'password'
	];

	protected function _setPassword($value) {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
