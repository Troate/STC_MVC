<?php
/**
 * This code contains Student Controller
 */


/**
 * Includes Student Model Class
 */
require_once 'C:\xampp\htdocs\STC_MVC\index.php';
require_once ROOTPATH.'\core/models/model_factory.php';
require_once ROOTPATH.'\core/models/database/Dbal.php';

/**
 * Student_controller this creates Student Model
 */
class student_controller{
    public static $model;
    public function __call($name, $arguments) {
        
    }
    public function __construct($field) {
        $modelFactory=new model_factory();
        self::$model=$modelFactory->getModel($field);
    }
    public function callOp($op) {
        if($op=="create"){
            require_once ROOTPATH.'/app/views/student/add.php';
        }
        if($op=="read"){
            require_once ROOTPATH.'/app/views/student/list.php';
        }
        if($op=="delete"){
            require_once ROOTPATH.'/app/views/student/delete.php';
        }
        if($op=="update"){
            require_once ROOTPATH.'/app/views/student/update.php';
        }
    }
    public function create($tableName,$name,$age,$degree) {
        try{
            if($name==''||$degree=='')
            {throw new Exception;}
            self::$model->setName($name);
            self::$model->setAge($age);
            self::$model->setDegree($degree);
            $values[0]="";
            $values[1]=self::$model->getName();
            $values[2]=self::$model->getAge();
            $values[3]=self::$model->getDegree();
            $d=new Dbal();
            $d->insertQuery($tableName,$values);
            header('Location: \STC_MVC\index.php');
            die();
        }
        catch (Exception $e)
        {
            header('Location: \STC_MVC\core\views\error.php');
            die();
        }
    }
    public function read() {
        $mod= new model_factory();
        $model_array= $mod->getModel("Student");
        $model_array=array();
        $d=new Dbal();
        $res=$d->selectQuery("student");
        //echo '<table><tr><th style="min-width:100px ">Name</th><th style="min-width:100px ">Age</th><th style="min-width:100px ">Degree</th></tr>';
        while($row= $res->fetch())
        {
            $m=$mod->getModel("Student");
            $m->setId($row['Id']);
            $m->setName($row['Name']);
            $m->setAge($row['Age']);
            $m->setDegree($row['Degree']);
            array_push($model_array, $m);
            //echo '<tr><td style="text-align:center">'.$m->getName().'</td><td style="text-align:center">'.$m->getAge().'</td><td style="text-align:center">'.$m->getDegree().'</td></tr>';
        }
        //echo '</table>';
        return $model_array;
    }
    public function delete($tableName,$name,$age,$degree) {
        try{
                if(strlen($name)==0||strlen($degree)==0)
                {throw new Exception;}
                self::$model->setName($name);
                self::$model->setAge($age);
                self::$model->setDegree($degree);
                $names[0]="name";
                $names[1]="age";
                $names[2]="degree";
                $values[0]=self::$model->getName();
                $values[1]=self::$model->getAge();
                $values[2]=self::$model->getDegree();
                $d=new Dbal();
                $d->deleteQuery($tableName,$names,$values);
                header('Location: \STC_MVC\index.php');
                die();
            }
            catch (Exception $e){
                header('Location: \STC_MVC\core\views\error.php');
                die();
            }
    }
    
    public function update($tableName,$name,$age,$degree,$oname,$oage,$odegree) {
        try{
                if(strlen($name)==0||strlen($degree)==0||strlen($oname)==0||strlen($odegree)==0)
                {throw new Exception;}
                $names[0]="name";
                $names[1]="age";
                $names[2]="degree";
                self::$model->setName($name);
                self::$model->setAge($age);
                self::$model->setDegree($degree);
                $values[0]=self::$model->getName();
                $values[1]=self::$model->getAge();
                $values[2]=self::$model->getDegree();
                $values[3]=$oname;
                $values[4]=$oage;
                $values[5]=$odegree;
                $d=new Dbal();
                $d->updateQuery($tableName,$names,$values);
                header('Location: \STC_MVC\index.php');
                die();
            }
            catch (Exception $e){
                header('Location: \STC_MVC\core\views\error.php');
                die();
            }
    } 
}
