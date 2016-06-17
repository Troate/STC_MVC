<?php
/**
 * Test File for student_controller
 */

/**
 * Includes
 */
require_once 'C:\xampp\htdocs\STC_MVC\public\index.php';
require_once $_SESSION['Root'].'\app/controllers/student_controller.php';


/**
 * Class sct (Student Controller Test) contains functions for testing student_controller functions and their data_provider functions
 */
class sct extends PHPUnit_Framework_TestCase
{
    /**
     * Calls the callOp funtion of student_controller and if false is not returned then it passes the test
     * @dataProvider test_callOp_DP
     * @param string $op Operations such as read, update and delete
     */
    function test_callOp($op)
    {
        $obj=new student_controller("Student");
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
     * Tests the delete funciton of student_controller
     * @dataProvider test_delete_DP
     * @param string $tableName Name of the table which is the type of the Model(Course, Teacher or Student)
     * @param string $name Name of the Student
     * @param string $age Age of the Student
     * @param string $degree Name of the Degree
     * @param boolean $result True or False
     */
    function test_delete($tableName,$name,$age,$degree,$result) {
        $obj=new student_controller("Student");
        $this->assertEquals($obj->delete($tableName,$name,$age,$degree),$result);
    }
    
    /**
     * Data Provider of he function test_delete
     * @return PHPUnit Results
     */
    function test_delete_DP()
    {
        return array(array("student","Taha","22" ,"",false),
                     array("student","Test Student2","23","BSCS",true));
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
    function test_update($tableName,$name,$age,$degree,$oname,$oage,$odegree,$result)
    {
        $obj=new student_controller("Student");
        $this->assertEquals($obj->update($tableName,$name,$age,$degree,$oname,$oage,$odegree),$result);
    }
    
    /**
     * Data Provider of test_update
     * @return PHPUnit Results
     */
    function test_update_DP() {
        return array(array("student","Usama","21","BCSC","SS1","21","BS",true),
                     array("student","Akbar","49","BA","Test Student2","23","BSCS",false));
    }
}