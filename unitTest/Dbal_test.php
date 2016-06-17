<?php
/**
 * Test file for Dbal
 */

/**
 * Includes
 */
require_once 'C:\xampp\htdocs\STC_MVC\public\index.php';
require_once $_SESSION['Root'].'\core\models\database\Dbal.php';

/**
 * Contains test functions for the Dbal
 */
class DbalTest extends PHPUnit_Framework_TestCase
{
    /**
     * Tests insertQuery Function of Dbal
     * @dataProvider test_insertQuery_DP
     * @param string $tableName Name of the Table to send or recieve data from
     * @param string/int_array $cell_values Contains the values that are to be inserted in Table
     */
    function test_insertQuery($tableName, $values,$result)
    {
        $obj=new Dbal();
        $this->assertEquals($obj->insertQuery($tableName,$values),$result);
    }
    
    /**
     * Data Provider of test_insertQuery()
     */
    function test_insertQuery_DP()
    {
        return array(array("student",array("","testInsert"),true),
                     array("tudent",array("","testInsert"),false));
    }
}