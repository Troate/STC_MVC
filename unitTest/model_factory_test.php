<?php
/**
 * Test File for model_factory
 */

/**
 * Includes
 */
require_once 'C:\xampp\htdocs\STC_MVC\public\index.php';
require_once $_SESSION['Root'].'\core/models/model_factory.php';


/**
 * Class mft(Model Factory Test) contains functions for testing model_factory functions and their data_provider functions
 */
class mft extends PHPUnit_Framework_TestCase
{
    /**
     * Calls the getModel funtion of model_factory and if false is not returned then it passes the test
     * @dataProvider test_getModel_DP
     * @param string $model Models such as Teacher, Student and Course
     */
    function test_getModel($model)
    {
        $obj=new model_factory();
        $this->assertNotFalse($obj->getModel($model));
    }
    
    /**
     * It is the Data Provider of function test_getModel()
     * @return PHPUnit Test Results
     */
    function test_getModel_DP() {
        return array(array("Student"),
                     array("Teacher"),
                     array("Course"));
    }
}