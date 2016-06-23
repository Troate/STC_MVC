<?php
/**
 * This code contains Student Controller
 */
require_once ROOT.DS.'core'.DS.'controllers'.DS.'base_controller.php';

/**
 * Student_controller this creates Student Model
 */
class student_controller extends baseController{
    
    /**
     * Magic function is defined as empty, so if someone calls non-declared function they will not see errors
     * @param string $name Default parameter, does nothing
     * @param string $arguments Default parameter, does nothing
     */
    public function __call($name, $arguments) {
        
    }
    /**
     * Its a construtor, which initialases $model with appropriate object
     * @param string $field It is passed to modelfactory, which gives appropriate object of Model i.e.(Course, Teacher, Student)
     */
    public function __construct($field) {
        parent::__construct($field);
    }
    /**
     * According to the value of $op, and according to the controller, it will require its view
     * @param string $op It contains operation type; read, delete or update
     * @param string $field This field will call the $op of specific $field
     */
    public function callOp($op,$field) {
        $field="student";
        return  parent::CallOp($op, $field);
    }
    /**
     * It is provided with tableName and the name of the Object, It creates Object send it DBAL
     * @param string $tableName Name of the table which is the type of the Model(Course, Teacher or Student)
     * @param string $name Name of the Course, Teacher or Student
     */
    public function create($parameter) {
        return parent::create($parameter);
    }
    /**
     * The result of select query is assigned to a object and the that objest is pushed in array of the same object, whish is returned
     * @return Object_array Populated with the result of select query
     */
    public function read() {
        $mod= new model_factory();
        $model_array= $mod->getModel("Student");
        $model_array=array();
        $d=new Dbal();
        $res=$d->selectQuery(get_class(self::$model));
        while($row= $res->fetch())
        {
            $m=$mod->getModel("Student");
            $m->setId($row['Id']);
            $m->setName($row['Name']);
            $m->setAge($row['Age']);
            $m->setDegree($row['Degree']);
            array_push($model_array, $m);
        }
        require_once ROOT.DS.'app'.DS.'views'.DS.get_class(self::$model).DS.'list.php';
        return $model_array;
    }
    /**
     * Makes object and initalise it with values and sends it to the database layer
     * @param string $tableName Name of the table which is the type of the Model(Course, Teacher or Student)
     * @param string $name Name of the Student
     * @param string $age Age of the Student
     * @param string $degree Name of the Degree
     * @throws Exception Exception takes to Error page error.php
     */
    public function delete($parameter) {
        $name=$parameter[0];
        $age=$parameter[1];
        $degree=$parameter[2];
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
                $d->deleteQuery(get_class(self::$model),$names,$values);
                return true;
            }
            catch (Exception $e){
                return false;
            }
    }
    /**
     * Creates object, initialize with old values and then set new Values
     * @param string $tableName Name of the table which is the type of the Model(Course, Teacher or Student)
     * @param string $name New Name of Student
     * @param string $age New age of Student
     * @param string $degree New Degree
     * @param string $oname Old name of Student
     * @param string $oage Old agee of Student
     * @param string $odegree Old Degree
     * @throws Exception Exception takes to Error page error.php
     */
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
                $d->updateQuery(get_class(self::$model),$names,$values);
                return true;
            }
            catch (Exception $e){
                return false;
            }
    } 
}
