<?php
/**
 * Test File for course_controller
 */

/**
 * Includes
 */
require_once 'C:\xampp\htdocs\STC_MVC\public\index.php';
use core\controllers\controllerFactory;


/**
 * Class cct(Course Controller Test) contains functions for testing course_controller functions and their data_provider functions
 */
class cct extends PHPUnit_Framework_TestCase
{
    /**
     * Calls the callOp funtion of course_controller and if false is not returned then it passes the test
     * @dataProvider test_callOp_DP
     * @param string $op Operations such as read, update and delete
     */
    function test_callOp($op)
    {
        $obj=new controllerFactory();
        $s=$obj->getController("Course");
        $this->assertNotFalse($s->callOp($op,"course"));
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
     * Name of Course
     * CourseId of Course
     * * @param bool $result True or False
     */
    function test_create($parameter,$result) {
        $obj=new controllerFactory();
        $s=$obj->getController("Course");
        $this->assertEquals($s->create($parameter),$result);
    }
    
    /**
     * Data Provider of the function test_create()
     */
    function test_create_DP() {
        return array(array(array("","xx000"),false),
                     array(array("OOAD","xx000"),true));
    }
    /**
     * Tests the update functionality of course_controller
     * @dataProvider test_update_DP
     * @param string_array $parameter It Contains following parameters
     * Old Name of Course
     * Old CourseId of Course
     * New Name of Course
     * New CourseId of Course
     * @param boolean $result True or False
     */
    function test_update($parameter,$result)
    {
        $obj=new controllerFactory();
        $s=$obj->getController("Course");
        $this->assertEquals($s->update($parameter),$result);
    }
    
    /**
     * Data Provider of test_update
     * @return PHPUnit Results
     */
    function test_update_DP() {
        return array(array(array("OOAD","CS101","OOAD","xx000"),true),
                     array(array("ITC","CS101","ITC","CS103"),false));
    }
    /**
     * Tests the delete funciton of course_controller
     * @dataProvider test_delete_DP
     * @param string_array $parameter It Contains following parameters
     * Name of Course
     * CourseId of Course
     * @param boolean $result True or False
     */
    function test_delete($parameter,$result) {
        $obj=new controllerFactory();
        $s=$obj->getController("Course");
        $this->assertEquals($s->delete($parameter),$result);
    }
    
    /**
     * Data Provider of he function test_delete
     * @return PHPUnit Results
     */
    function test_delete_DP()
    {
        return array(array(array("ITC",""),false),
                     array(array("OOAD","CS101"),true));
    }
    
    
}