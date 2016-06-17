<?php
/**
 * Interface of Model User
 */

/**
 * Interface of Model:User, it contains functions and variables a Model should have
 */
interface modelInterface {
    /**
     * Getter of Username
     * @return string Username
     */
    function getName();
    /**
     * Setter of Username
     * @param string $name Username
     */
    function setName($name);
}
