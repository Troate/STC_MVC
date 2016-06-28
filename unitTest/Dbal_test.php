<?php
/**
 * Test file for Dbal
 */

/**
 * Includes
 */
require_once 'C:\xampp\htdocs\STC_MVC\public\index.php';
use core\models\database\Dbal;

/**
 * Contains test functions for the Dbal
 */
class DbalTest extends PHPUnit_Framework_TestCase
{
    /**
     * Tests insertQuery Function of Dbal
     * @dataProvider test_selectQuery_DP
     * @param string $tableName Name of the Table to send or recieve data from
     */
    function test_selectQuery($tableName,$result)
    {
        $obj=new Dbal();
        $this->assertEquals($obj->selectQuery($tableName),$result);
    }
    
    /**
     * Data Provider of test_insertQuery()
     */
    function test_selectQuery_DP()
    {
        return array(array("student",true),
                     array("tudent",false));
    }
}