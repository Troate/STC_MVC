<?php
/**
 * Configuration of Database
 */

/**
 * DB_TYPE has type of database like mysql or mysqli or sqlite.
 *
 * DB_Name of the database to connect to.
 * 
 * DB_USER who can connect to database.
 * 
 * DB_PASSWORD of the User.
 * 
 * DB_NAME of the Server.
 */
global $DB;
$DB=array('DB_TYPE'=>'mysql','DB_HOST'=>'localhost','DB_NAME'=>'stc','DB_USER'=>'testUser','DB_PASSWORD'=>'testpass','db'=>'pdo');

global $config;
$config=array('entity'=>'default','action'=>'index');