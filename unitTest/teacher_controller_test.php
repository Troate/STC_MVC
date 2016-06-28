<?php
/**
 * Test File for teacher_controller
 */

/**
 * Includes
 */
require_once 'C:\xampp\htdocs\STC_MVC\public\index.php';
use core\controllers\controllerFactory;


/**
 * Class tct (Teacher Controller Test) contains functions for testing teacher_controller functions and their data_provider functions
 */
class tct extends PHPUnit_Framework_TestCase
{
    /**
     * Calls the callOp funtion of teacher_controller and if false is not returned then it passes the test
     * @dataProvider test_callOp_DP
     * @param string $op Operations such as read, update and delete
     */
    function test_callOp($op)
    {
        $obj=new controllerFactory();
        $s=$obj->getController("Teacher");
        $this->assertNotFalse($s->callOp($op,"teacher"));
    }
    
    /**
     * It is the Data Provider of function test_callOp()
     * @return PHPUnit Test Results
     */
    function test_callOp_DP() {
        return array(array("list"),
                     array("delete"),
                     array("update"));
    }
    /**
     * Tests the function create for every user
     * @dataProvider test_create_DP
     * @param string_array $parameter It Contains following parameters
     * Name of Teacher
     * Age of Teacher
     * Course of Teacher
     * @param boolean $result True or False
     */
    function test_create($parameter,$result) {
        $obj=new controllerFactory();
        $s=$obj->getController("Teacher");
        $this->assertEquals($s->create($parameter),$result);
    }
    
    /**
     * Data Provider of the function test_create()
     */
    function test_create_DP() {
        return array(array(array("","",""),false),
                     array(array("SahfeeqTest","45","DB"),true));
    }
    /**
     * Tests the update functionality of course_controller
     * @dataProvider test_update_DP
     * @param string_array $parameter It Contains following parameters
     * Old Name of Teacher
     * Old Age of Teacher
     * Old Course of Teacher
     * New Name of Teacher
     * New Age of Teacher
     * New Course of Teacher
     * @param boolean $result True or False
     */
    function test_update($parameter,$result)
    {
        $obj=new controllerFactory();
        $s=$obj->getController("Teacher");
        $this->assertEquals($s->update($parameter),$result);
    }
    
    /**
     * Data Provider of test_update
     * @return PHPUnit Results
     */
    function test_update_DP() {
        return array(array(array("ShafeeqTest","31","ITC","ShafeeqTest","45","DB"),true),
                     array(array("Akbar","49","BA","Test Student2","23","BSCS"),false));
    }
    /**
     * Tests the delete funciton of teacher_controller
     * @dataProvider test_delete_DP
     * @param string_array $parameter It Contains following parameters
     * Name of Teacher
     * Age of Teacher
     * Course of Teacher
     * @param boolean $result True or False
     */
    function test_delete($parameter,$result) {
        $obj=new controllerFactory();
        $s=$obj->getController("Teacher");
        $this->assertEquals($s->delete($parameter),$result);
    }
    
    /**
     * Data Provider of he function test_delete
     * @return PHPUnit Results
     */
    function test_delete_DP()
    {
        return array(array(array("Waqar","39" ,""),false),
                     array(array("ShafeeqTest","31","ITC"),true));
    }
    
    
}

