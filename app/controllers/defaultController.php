<?php
/**
 * Default Controller
 */

namespace app\controllers;
use core\controllers\controllerInterface;
/**
 * defaultController displays CRUD options
 */
class defaultController implements controllerInterface{
    /**
     * callOp calls view to display CRUD
     * @param string $attribute attribute like Course, Teacher and Student
     */
    public function callOp($attribute) {
        $default=true;
        require_once ROOT.DS.'core'.DS.'views'.DS.'viewManager.php';
    }
}
