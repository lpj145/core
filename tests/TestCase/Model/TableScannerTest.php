<?php


/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace MixerApi\Core\Test\TestCase\Model;

use Cake\TestSuite\TestCase;
use MixerApi\Core\Model\TableScanner;
use Cake\Datasource\ConnectionManager;

class TableScannerTest extends TestCase
{
    /**
     * @var string[]
     */
    protected $fixtures = [
        'plugin.MixerApi/Core.Actors',
    ];

    /**
     * @var \Bake\Utility\TableScanner
     */
    protected $tableScanner;

    /**
     * @var \Cake\Database\Connection
     */
    protected $connection;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->connection = ConnectionManager::get('test');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        parent::tearDown();
        unset($this->tableScanner);
    }

    /**
     * @return void
     */
    public function testListAll()
    {
        $this->tableScanner = new TableScanner($this->connection);

        $result = $this->tableScanner->listAll();
        $this->assertArrayHasKey('actors', $result);
    }

    /**
     * @return void
     */
    public function testListUnskipped()
    {
        $this->tableScanner = new TableScanner($this->connection);

        $result = $this->tableScanner->listUnskipped();
        $this->assertArrayHasKey('actors', $result);
    }
}