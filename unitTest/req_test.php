<?php
/**
 * Test of req
 */

/**
 * Includes
 */
require_once 'C:\xampp\htdocs\STC_MVC\public\index.php';
use core\utils\req;

/**
 * Test Class of req class
 */
class req_test extends PHPUnit_Framework_TestCase{
    
    /**
     * Tests callControllerFunction of req
     * @dataProvider testcallControllerFunction_DP
     * @param string $parameter Values to be inserted
     * @param string $func Operation like create or delete
     * @param string $class Field like Student or Teacher
     * @param string $result True or False
     */
    public function testcallControllerFunction($parameter,$func,$class,$result) {
        $request = new req($class, $func);
        $request->setParameter($parameter);
        $request->setFunc($func);
        $request->setClass($class);
        $this->assertEquals($request->callControllerFunction(),$result);
    }
    /**
     * Data Provider of testcallControllerFunction
     */
    public function testcallControllerFunction_DP() {
        return array(array(array("Test Student","20","bs"),"create","student",true),
                     array(array("Test Student","20",""),"create","student",false),
                     array(array("Test Student","20","bs"),"created","student",false));
    }
}
