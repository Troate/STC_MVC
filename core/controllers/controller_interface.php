<?php
/**
 * Interface of Controllers
 */

/**
 * Interface of Controllers
 */
interface controllerInterface
{
    /**
     * According to the value of $op, and according to the controller, it will require its view
     * @param string $op It contains operation type; read, delete or update
     * @param string $field This field will call the $op of specific $field
     */
    function CallOp($op,$field);
    /**
     * It is provided with tableName and the name of the Object, It creates Object send it DBAL
     * @param string $tableName Name of the table which is the type of the Model(Course, Teacher or Student)
     * @param string $name Name of the Course, Teacher or Student
     * @throws Exception Exception takes to Error page error.php
     */
    function create($tableName,$name);
}