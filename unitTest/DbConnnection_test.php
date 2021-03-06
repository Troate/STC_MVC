<?php
/**
 * Test File for dbConnestion
 */

/**
 * Includes
 */
require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'index.php';
use core\models\database\DbConnection;
/**
 * Class DbCt(Database Controller Test) contains function for teting the singleton property of DbConnection
 */
class DbCt extends PHPUnit_Framework_TestCase
{
    /**
     * Tests getConnection, if its singleton property working properly
     * @dataProvider test_getConnection_DP
     * @param DbConnection_Object $res Expected Result
     */
    function test_getConnection($res)
    {
        $exp=DbConnection::getConnection();
        $this->assertEquals($exp,$res);
    }
    
    /**
     * Data Provider of test_getConnection()
     * @return PHPUnit Results
     */
    function test_getConnection_DP()
    {
        return array(array(DbConnection::getConnection()));
    }
}

