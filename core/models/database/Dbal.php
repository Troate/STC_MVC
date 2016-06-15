<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dbal
 *
 * @author Troate
 */

require_once 'C:/xampp/htdocs/STC_MVC/index.php';
require_once ROOTPATH.'/core/models/database/DbConnection.php';

class Dbal {
    //put your code here
    private $pdo;
    function __construct() {
        $this->pdo=DbConnection::getConnection();
    }

    function insertQuery($tableName, $cell_values) {
        $count=count($cell_values);
        $string="insert into $tableName values (";
        for ($i=0;$i<$count;$i++) {
            $string= $string. "?,";
        }
        $string=rtrim($string,",");
        $string=$string." )";
        echo $string."<br>";
        print_r($cell_values);
        
        $stmt=  $this->pdo->prepare($string);
        $stmt->execute($cell_values);
    }
    
    function selectQuery($tableName)
    {
        $string="select * from  $tableName ";
        $res= $this->pdo->query($string);
        return $res;
    }
    
    function deleteQuery($tableName, $cell_name, $cell_values) {
        $count=count($cell_values);
        $string="delete from $tableName where ";
        for ($i=0;$i<$count;$i++)
        {
            $string=$string.$cell_name[$i]."=? and ";
        }
        $string=  rtrim($string," and ");
        echo $string."<br>";
        print_r($cell_values);
        $stmt=  $this->pdo->prepare($string);
        $stmt->execute($cell_values);
        if($stmt->rowCount()<=0)
        {    
            throw new Exception;
        }
    }
    
    function updateQuery($tableName,$cell_name,$cell_values) {
        $count=count($cell_name);
        $string="update $tableName set ";
        for ($i=0;$i<$count;$i++)
        {
            $string=$string.$cell_name[$i]."=?, ";
        }
        $string=  rtrim($string,", ");
        $string=$string." where ";
        for ($i=0;$i<$count;$i++)
        {
            $string=$string.$cell_name[$i]."=? and ";
        }
        $string=  rtrim($string," and ");
        echo $string."<br>";
        print_r($cell_values);
        $stmt=  $this->pdo->prepare($string);
        $stmt->execute($cell_values);
        if($stmt->rowCount()<=0)
        {    
            throw new Exception;
        }
    }
}
