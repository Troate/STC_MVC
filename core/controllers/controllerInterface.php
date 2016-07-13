<?php
/**
 * Interface of Controllers
 */

/**
 * Namespaces
 */
namespace core\controllers;

/**
 * Interface of Controllers
 */
interface controllerInterface
{
    /**
     * Calls either callop() or appropriate action funcitons
     */
    public function _action($obj);
    /**
     * Renders Views
     */
    public function CallOp($action, $entity);
}
