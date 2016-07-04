<?php
/**
 * Test File for baseController
 */

/**
 * Includes
 */
use core\controllers\controllerFactory;


/**
 * Class bct(Base Controller Test) contains functions for testing course_controller functions and their data_provider functions
 */
class bct extends PHPUnit_Framework_TestCase
{
    /**
     * Calls the callOp funtion of course_controller and if false is not returned then it passes the test
     * @dataProvider test_callOp_DP
     * @param string $op Operations such as read, update and delete
     * @param string $tableName Name of the table to insert value in
     */
    function test_callOp($op,$tableName)
    {
        $controller=new controllerFactory();
        $obj=$controller->getController($tableName);
        $this->assertNotFalse($obj->callOp($op,$tableName));
    }
    
    /**
     * It is the Data Provider of function test_callOp()
     * @return PHPUnit Test Results
     */
    function test_callOp_DP() {
        return array(array("list","Course"),
                     array("delete","Course"),
                     array("update","Course"),
                     array("list","Student"),
                     array("delete","Student"),
                     array("update","Student"),
                     array("list","Teacher"),
                     array("delete","Teacher"),
                     array("update","Teacher"));
    }
    
    /**
     * Tests the delete funciton of baseController
     * @dataProvider test_create_DP
     * @param string $tableName Name of the table to insert value in
     * @param array $parameters Parameters to be inserted
     * @param boolean $result True or False
     */
    function test_create($tableName,$parameters,$result) {
        $controller=new controllerFactory();
        $obj=$controller->getController($tableName);
        $this->assertEquals($obj->create($parameters),$result);
    }
    
    /**
     * Data Provider of he function test_delete
     * @return PHPUnit Results
     */
    function test_create_DP()
    {
        return array(array("Course",array("ITC",""),false),
                     array("Course",array("ITC","xx000"),true),
                     array("Student",array("check","",""),false),
                     array("Student",array("TestStudent","20","bs"),true),
                     array("Teacher",array("check","",""),false),
                     array("Teacher",array("TestTeacher","45","cs"),true));
    }
    
    /**
     * Tests the update functionality of course_controller
     * @dataProvider test_update_DP
     * @param string $tableName Name of the table to insert value in
     * @param array $parameters Parameters to be inserted
     * @param boolean $result True or False
     */
    function test_update($tableName,$parameters,$result)
    {
        $controller=new controllerFactory();
        $obj=$controller->getController($tableName);
        $this->assertEquals($obj->update($parameters),$result);
    }
    
    /**
     * Data Provider of test_update
     * @return PHPUnit Results
     */
    function test_update_DP() {
        return array(array("Course",array("ITC","CS101","ITC","xx000"),true),
                     array("Course",array("ITC","CS101","ITC","CS103"),false),
                     array("Student",array("TestStudentU","20","bs","TestStudent","20","bs"),true),
                     array("Student",array("check","","","TestStudent","",""),false),
                     array("Teacher",array("TestTeacherU","45","cs","TestTeacher","45","cs"),true),
                     array("Teacher",array("check","","","TestTeacher","",""),false));
    }
    
    /**
     * Tests the delete funciton of course_controller
     * @dataProvider test_delete_DP
     * @param string $tableName Name of the table to insert value in
     * @param array $parameters Parameters to be inserted
     * @param boolean $result True or False
     */
    function test_delete($tableName,$parameters,$result) {
        $controller=new controllerFactory();
        $obj=$controller->getController($tableName);
        $this->assertEquals($obj->delete($parameters),$result);
    }
    
    /**
     * Data Provider of he function test_delete
     * @return PHPUnit Results
     */
    function test_delete_DP()
    {
        return array(array("Course",array("ITC",""),false),
                     array("Course",array("ITC","CS101"),true),
                     array("Student",array("check",""),false),
                     array("Student",array("TestStudentU","20","bs"),true),
                     array("Teacher",array("check",""),false),
                     array("Teacher",array("TestTeacherU","45","cs"),true));
    }
    
    
}