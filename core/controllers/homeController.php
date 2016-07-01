<?php
/**
 * homeController
 */

namespace core\controllers;
use core\controllers\controllerInterface;
/**
 * homeController calls home.php via viewManager.php
 */
class homeController implements controllerInterface{
    /**
     * callOp calls viewManager.php which calls home.php
     */
    public function callOp() {
        $home=true;
        require_once ROOT.DS.'core'.DS.'views'.DS.'viewManager.php';
    }
}
