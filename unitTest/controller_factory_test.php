<?php
/**
 * Test File for controller_factory
 */

/**
 * Includes
 */
require_once 'C:\xampp\htdocs\STC_MVC\public\index.php';
use core\controllers\controllerFactory;


/**
 * Class cft(Controller Factory Test) contains functions for testing controller_factory functions and their data_provider functions
 */
class cft extends PHPUnit_Framework_TestCase
{
    /**
     * Calls the getController funtion of controller_factory and if false is not returned then it passes the test
     * @dataProvider test_getController_DP
     * @param string $field Fields such as Teacher, Student and Course
     */
    function test_getController($field)
    {
        $obj=new controllerFactory();
        $this->assertNotFalse($obj->getController($field));
    }
    
    /**
     * It is the Data Provider of function test_getController()
     * @return PHPUnit Test Results
     */
    function test_getController_DP() {
        return array(array("Student"),
                     array("Teacher"),
                     array("Course"));
    }
}