<?php
/**
 * Test File for addUser
 */

/**
 * Includes
 */
require_once 'C:\xampp\htdocs\STC_MVC\public\index.php';
require_once $_SESSION['Root'].'\app\views\generic\addUser.php';

/**
 * Contains functions to test adduser Functionality
 */
class testAddUser extends PHPUnit_Framework_TestCase
{
    /**
     * Tests the function create for every user
     * @dataProvider test_create_DP
     * @param string $tableName Name of the Table to insert value in
     * @param string $name Name of the Course, Student and Teacher
     */
    function test_create($tableName,$name,$result) {
        $obj=new addUser($tableName);
        $this->assertEquals($obj->create($tableName, $name),$result);
    }
    
    /**
     * Data Provider of the function test_create()
     */
    function test_create_DP() {
        return array(array("Student","",false),
                     array("Teacher","Shafeeq",true));
    }
}