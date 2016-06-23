<?php
/**
 * Request Class
 */

/**
 * Request Class
 */
class req
{
    public $field;
    public $op;
    public function __construct($field, $op) {
        $this->field=$field;
        $this->op=$op;
    }
}
