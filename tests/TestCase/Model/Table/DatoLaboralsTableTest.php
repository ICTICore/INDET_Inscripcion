<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DatoLaboralsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DatoLaboralsTable Test Case
 */
class DatoLaboralsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dato_laborals',
        'app.estados',
        'app.municipios',
        'app.usuarios',
        'app.dato_personals',
        'app.dato_sindicals',
        'app.users',
        'app.roles',
        'app.roles_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DatoLaborals') ? [] : ['className' => 'App\Model\Table\DatoLaboralsTable'];
        $this->DatoLaborals = TableRegistry::get('DatoLaborals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DatoLaborals);

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
