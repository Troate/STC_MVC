<?php
/**
 * Test file for Dbal
 */

/**
 * Includes
 */

use core\models\database\Dbal;

/**
 * Contains test functions for the Dbal
 */
class DbalTest extends PHPUnit_Framework_TestCase
{
    /**
     * Tests insertQuery Function of Dbal
     * @dataProvider test_insertQuery_DP
     * @param string $tableName Name of the Table to send or recieve data from
     * @param string_array $cell Column Names
     * @param string_array $value Values to be inserted in given column names
     */
    function test_insertQuery($tableName,$cell,$value,$result)
    {
        $obj=new Dbal();
        $this->assertEquals($obj->insertQuery($tableName,$cell,$value),$result);
    }
    
    /**
     * Data Provider of test_insertQuery()
     */
    function test_insertQuery_DP()
    {
        return array(array("student",array("Name","Age","Degree"),array("TestInsert","22","bs"),true),
                     array("tudent",array("Name","Age","Degree"),array("TestInsert2","22","bs"),false));
    }
}