<?php
/**
 * Metadata of Course
 */

namespace app\models\metadata;

/**
 * Metadata of Course
 */
class course
{
    /**
     * Zero array has Column Names.
     *
     * First array has Primary Column.
     *
     * Second array has datatypes of columns.
     *
     * Third array has Numeric datatypes set as true.
     *
     * @return array_of_arrays
     */
    public function metaData()
    {
        return array(
            // Every column in the mapped table
            array(
                'Id', 'Name', 'CourseId'
            ),

            // Every column part of the primary key
            array(
                'Id'
            ),

            // Every column and their data types
            array(
                'Id'   => "Auto_Increment",
                'Name' => "Varchar",
                'CourseId' => "Varchar"
            ),

            // The columns that have numeric data types
            array(
                'Id'   => true,
            ),


        );
    }
}
?>