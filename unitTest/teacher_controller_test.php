<?php
/**
 * Test File for teacher_controller
 */

/**
 * Includes
 */
require_once 'C:\xampp\htdocs\STC_MVC\public\index.php';
require_once $_SESSION['Root'].'\core/controllers/controller_factory.php';


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
        $obj=new controller_factory();
        $s=$obj->getController("Teacher");
        $this->assertNotFalse($s->callOp($op,"teacher"));
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
     * Tests the function create for every user
     * @dataProvider test_create_DP
     * @param string $tableName Name of the Table to insert value in
     * @param string $name Name of the Course, Student and Teacher
     */
    function test_create($tableName,$name,$result) {
        $obj=new controller_factory();
        $s=$obj->getController("Teacher");
        $this->assertEquals($s->create($tableName, $name),$result);
    }
    
    /**
     * Data Provider of the function test_create()
     */
    function test_create_DP() {
        return array(array("Teacher","",false),
                     array("Teacher","Sahfeeq",true));
    }
    /**
     * Tests the delete funciton of teacher_controller
     * @dataProvider test_delete_DP
     * @param string $tableName Name of the table which is the type of the Model(Course, Teacher or Student)
     * @param string $name Name of the Teacher
     * @param string $age Age of the Teacher
     * @param string $course Name of the Course
     * @param boolean $result True or False
     */
    function test_delete($tableName,$name,$age,$course,$result) {
        $obj=new controller_factory();
        $s=$obj->getController("Teacher");
        $this->assertEquals($s->delete($tableName,$name,$age,$course),$result);
    }
    
    /**
     * Data Provider of he function test_delete
     * @return PHPUnit Results
     */
    function test_delete_DP()
    {
        return array(array("teacher","Waqar","39" ,"",false),
                     array("teacher","Test","0","Course Name",true));
    }
    
    /**
     * Tests the update functionality of course_controller
     * @dataProvider test_update_DP
     * @param string $tableName Name of the table which is the type of the Model(Course, Teacher or Student)
     * @param string $name New Name of Teacher
     * @param string $age New age of Teacher
     * @param string $course New Course
     * @param string $oname Old name of Teacher
     * @param string $oage Old agee of Teacher
     * @param string $ocourse Old Course
     * @param boolean $result True or False
     */
    function test_update($tableName,$name,$age,$course,$oname,$oage,$ocourse,$result)
    {
        $obj=new controller_factory();
        $s=$obj->getController("Teacher");
        $this->assertEquals($s->update($tableName,$name,$age,$course,$oname,$oage,$ocourse),$result);
    }
    
    /**
     * Data Provider of test_update
     * @return PHPUnit Results
     */
    function test_update_DP() {
        return array(array("teacher","Sarim Baig","31","ITC","Test2","0","Course Name",true),
                     array("teacher","Akbar","49","BA","Test Student2","23","BSCS",false));
    }
}

