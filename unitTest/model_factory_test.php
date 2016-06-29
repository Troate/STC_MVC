<?php
/**
 * Test File for model_factory
 */

/**
 * Includes
 */
use core\models\modelFactory;


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
        $obj=new modelFactory();
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