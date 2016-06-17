<?php
/**
 * Test File for course_controller
 */

/**
 * Includes
 */
require_once 'C:\xampp\htdocs\STC_MVC\public\index.php';
require_once $_SESSION['Root'].'\app/controllers/course_controller.php';


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
        $obj=new course_controller("Course");
        $this->assertNotFalse($obj->callOp($op));
    }
    
    /**
     * It is the Data Provider of function test_callOp()
     * @return PHPUnit Test Results
     */
    function test_callOp_DP() {
        return array(array("read"),
                     array("delete"),
                     array("update"));
    }
    
    /**
     * Tests the delete funciton of course_controller
     * @dataProvider test_delete_DP
     * @param string $tableName Name of the table to insert value in
     * @param string $name Name of Course
     * @param string $courseid Course Id
     * @param boolean $result True or False
     */
    function test_delete($tableName,$name,$courseid,$result) {
        $obj=new course_controller("Course");
        $this->assertEquals($obj->delete($tableName, $name, $courseid),$result);
    }
    
    /**
     * Data Provider of he function test_delete
     * @return PHPUnit Results
     */
    function test_delete_DP()
    {
        return array(array("course","ITC","",false),
                     array("course","ITC","CS103",true));
    }
    
    /**
     * Tests the update functionality of course_controller
     * @dataProvider test_update_DP
     * @param string $tableName Name of the table to insert value in
     * @param string $name New Name of Course
     * @param string $courseid New Course Id
     * @param string $oname Old Name of Course
     * @param string $ocourseid Old Course Id
     * @param boolean $result True or False
     */
    function test_update($tableName,$name,$courseid,$oname,$ocourseid,$result)
    {
        $obj=new course_controller("Course");
        $this->assertEquals($obj->update($tableName, $name, $courseid, $oname, $ocourseid),$result);
    }
    
    /**
     * Data Provider of test_update
     * @return PHPUnit Results
     */
    function test_update_DP() {
        return array(array("course","ITC","CS101","ITC","xx000",true),
                     array("course","ITC","CS101","ITC","CS103",false));
    }
}