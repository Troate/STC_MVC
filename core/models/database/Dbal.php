<?php
/**
 * It is the Database Abstract Layer
 */

/**
 * Namespcaes
 */
namespace core\models\database;

/**
 * It is the abstract DBAL to connect to Database, and get the values from and into the Database
 */
interface Dbal {
    /**
     * Run query to insert the values in table
     * @param string $tableName Name of the Table to send or recieve data from
     * @param string/int_array $cell_values Contains the values that are to be inserted in Table
     */
    function insertQuery($tableName, $cell_names, $cell_values);
    /**
     * Runs the select * Query
     * @param string $tableName Name of the Table to send or recieve data from
     * @return PDO_Object Result of PDO_Query function
     */
    function selectQuery($tableName);
    /**
     * Runs Delete Query
     * @param string $tableName Name of the Table to send or recieve data from
     * @param array $cell_name Name of the Columns
     * @param string/int_array $cell_values Values of those Columns
     * @throws Exception If there are no resultant rows
     */
    function deleteQuery($tableName, $cell_name, $cell_values);
    /**
     * Run Update Query
     * @param string $tableName Name of the Table to send or recieve data from
     * @param array $cell_name Name of the Columns
     * @param string/int_array $cell_values Value of the Columns
     * @throws Exception If there are no resultant rows
     */
    function updateQuery($tableName,$cell_name,$cell_values);
}
