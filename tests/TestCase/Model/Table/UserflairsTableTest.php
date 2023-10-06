<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserflairsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserflairsTable Test Case
 */
class UserflairsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserflairsTable
     */
    protected $Userflairs;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Userflairs',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Userflairs') ? [] : ['className' => UserflairsTable::class];
        $this->Userflairs = $this->getTableLocator()->get('Userflairs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Userflairs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserflairsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UserflairsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
