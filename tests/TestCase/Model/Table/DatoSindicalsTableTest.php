<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DatoSindicalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DatoSindicalsTable Test Case
 */
class DatoSindicalsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dato_sindicals',
        'app.usuarios',
        'app.dato_personals',
        'app.dato_laborals',
        'app.estados',
        'app.municipios',
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
        $config = TableRegistry::exists('DatoSindicals') ? [] : ['className' => 'App\Model\Table\DatoSindicalsTable'];
        $this->DatoSindicals = TableRegistry::get('DatoSindicals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DatoSindicals);

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
