<?php
/**
 * Test File for baseModel
 */

/**
 * Includes
 */
use core\models\modelFactory;


/**
 * Class bmt(Base Model Test) contains functions for testing baseModel functions and their data_provider functions
 */
class bmt extends PHPUnit_Framework_TestCase
{
    /**
     * Tests insert Function of baseModel
     * @dataProvider test_insert_DP
     * @param string $tableName Name of the Table to send or recieve data from
     * @param array $cell Column Names
     * @param array $value Values to be inserted in given column names
     */
    function test_insert($tableName,$cell,$value,$result)
    {
        $model=new modelFactory();
        $obj=$model->getModel(ucfirst($tableName));
        $obj->__set("names",$cell);
        for($i=0;$i<count($obj->__get("names"));$i++)
        {
            $obj->__set($cell[$i],$value[$i]);
        }
        $this->assertEquals($obj->insert(),$result);
    }
    
    /**
     * Data Provider of test_insert()
     */
    function test_insert_DP()
    {
        return array(array("student",array("Name","Age","Degree"),array("TestStudent","22","bs"),true),
                     array("student",array("Name","Age","Degree"),array("TestStudent","",""),true),
                     array("teacher",array("Name","Age","Course"),array("TestTeacher","22","bs"),true),
                     array("teacher",array("Name","Age","Course"),array("TestTeacher","",""),true),
                     array("course",array("Name","CourseId"),array("TestCourse","xx000"),true),
                     array("course",array("Name","CourseId"),array("TestCourse",""),true));
    }
    /**
     * Tests update Function of baseModel
     * @dataProvider test_update_DP
     * @param string $tableName Name of the Table to send or recieve data from
     * @param array $cell Column Names
     * @param array $value Values to be inserted in given column names
     */
    function test_update($tableName,$cell,$value,$result)
    {
        $model=new modelFactory();
        $obj=$model->getModel(ucfirst($tableName));
        $obj->__set("names",$cell);
        $i=0;
        for(;$i<count($obj->__get("names"));$i++)
        {
            $obj->__set($cell[$i],$value[$i]);
        }
        $m=$model->getModel(ucfirst($tableName));
        $m->__set("names",$cell);
        for($j=0;$j<count($m->__get("names"));$j++,$i++)
        {
            $m->__set($cell[$j],$value[$i]);
        }
        $this->assertEquals($obj->update($m),$result);
    }
    
    /**
     * Data Provider of test_update()
     */
    function test_update_DP()
    {
        return array(array("student",array("Name","Age","Degree"),array("TestStudent","20","bs","TestStudent","22","bs"),true),
                     array("student",array("Name","Age","Degree"),array("TestStudent","20","bs","TestStudent","",""),true),
                     array("teacher",array("Name","Age","Course"),array("TestTeacher","20","bs","TestTeacher","22","bs"),true),
                     array("teacher",array("Name","Age","Course"),array("TestTeacher","20","bs","TestTeacher","",""),true),
                     array("course",array("Name","CourseId"),array("TestCourse","xx001","TestCourse","xx000"),true),
                     array("course",array("Name","CourseId"),array("TestCourse","xx001","TestCourse",""),true));
    }
    /**
     * Tests delete Function of baseModel
     * @dataProvider test_delete_DP
     * @param string $tableName Name of the Table to send or recieve data from
     * @param array $cell Column Names
     * @param array $value Values to be inserted in given column names
     */
    function test_delete($tableName,$cell,$value,$result)
    {
        $model=new modelFactory();
        $obj=$model->getModel(ucfirst($tableName));
        $obj->__set("names",$cell);
        for($i=0;$i<count($obj->__get("names"));$i++)
        {
            $obj->__set($cell[$i],$value[$i]);
        }
        $this->assertEquals($obj->del(),$result);
    }
    
    /**
     * Data Provider of test_delete()
     */
    function test_delete_DP()
    {
        return array(array("student",array("Name","Age","Degree"),array("TestStudent","20","bs"),true),
                     array("teacher",array("Name","Age","Course"),array("TestTeacher","20","bs"),true),
                     array("course",array("Name","CourseId"),array("TestCourse","xx001"),true));
    }
}