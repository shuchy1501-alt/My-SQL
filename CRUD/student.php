<?php

class Student{

    public $id;
    public $name;
    public $email;
    public $department;
    public $cgpa;

    public function __construct($id,$name,$email,$department,$cgpa){
        $this->id=$id;
        $this->name=$name;
        $this->email=$email;
        $this->department=$department;
        $this->cgpa=$cgpa;
    }

    public function save(){
        global $db;

        $db->query("INSERT INTO student(name,email,department,cgpa)
        VALUES('$this->name','$this->email','$this->department','$this->cgpa')");

        return $db->insert_id;
    }

    public static function find($id){
        global $db;

        $stmt=$db->query("SELECT * FROM student WHERE id=$id");

        return $stmt->fetch_object();
    }

    public function update(){
        global $db;

        return $db->query("
        UPDATE student SET
        name='$this->name',
        email='$this->email',
        department='$this->department',
        cgpa='$this->cgpa'
        WHERE id=$this->id
        ");
    }

   public static function delete($id){
    global $db;

    $id = (int)$id;

    return $db->query("DELETE FROM student WHERE id=$id");
}
    public static function all(){
        global $db;

        $data=[];

        $stmt=$db->query("SELECT * FROM student");

        $result=$stmt->fetch_all(MYSQLI_ASSOC);

        foreach($result as $value){
            $data[]=(object)$value;
        }

        return $data;
    }
}