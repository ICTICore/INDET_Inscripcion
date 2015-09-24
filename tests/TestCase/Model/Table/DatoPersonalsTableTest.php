<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DatoPersonalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DatoPersonalsTable Test Case
 */
class DatoPersonalsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dato_personals',
        'app.users',
        'app.roles',
        'app.roles_users',
        'app.usuarios',
        'app.dato_sindicals',
        'app.dato_laborals',
        'app.estados',
        'app.municipios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DatoPersonals') ? [] : ['className' => 'App\Model\Table\DatoPersonalsTable'];
        $this->DatoPersonals = TableRegistry::get('DatoPersonals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DatoPersonals);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
