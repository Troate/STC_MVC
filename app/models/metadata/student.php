<?php
/**
 * Metadata of Student
 */

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
function metaStudent()
{
   return array(
       // Every column in the mapped table
       array(
           'Id', 'Name', 'Age', 'Degree'
       ),

       // Every column part of the primary key
       array(
           'Id'
       ),

       // Every column and their data types
       array(
           'Id'   => "Auto_Increment",
           'Name' => "Varchar",
           'Age' => "Integer",
           'Degree' => "Varchar"
       ),

       // The columns that have numeric data types
       array(
           'Id'   => true,
           'Age' => true
       ),

   );
}
