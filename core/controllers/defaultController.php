<?php
/**
 * Default Controller
 */

namespace core\controllers;

/**
 * defaultController displays CRUD options
 */
class defaultController {
    /**
     * callOp calls view to display CRUD
     * @param string $field Field like Course, Teacher and Student
     */
    public function callOp($field) {
        $default=true;
        require_once ROOT.DS.'core'.DS.'views'.DS.'viewManager.php';
    }
}
