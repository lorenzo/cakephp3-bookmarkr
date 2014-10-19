<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\BookmarksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookmarksTable Test Case
 */
class BookmarksTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.bookmarks',
		'app.users',
		'app.tags',
		'app.bookmarks_tags'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Bookmarks') ? [] : ['className' => 'App\Model\Table\BookmarksTable'];
		$this->Bookmarks = TableRegistry::get('Bookmarks', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bookmarks);

		parent::tearDown();
	}

/**
 * Test initialize method
 *
 * @return void
 */
	public function testInitialize() {
		$this->markTestIncomplete('Not implemented yet.');
	}

/**
 * Test validationDefault method
 *
 * @return void
 */
	public function testValidationDefault() {
		$this->markTestIncomplete('Not implemented yet.');
	}

}
