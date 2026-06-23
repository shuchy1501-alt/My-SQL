<?php

class Student
{
    public $id;
    public $name;
    public $email;
    public $department;
    public $cgpa;

    public function __construct($id = null, $name = null, $email = null, $department = null, $cgpa = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->department = $department;
        $this->cgpa = $cgpa;
    }

    public static function find($id)
    {
        global $db;

        $id = (int)$id;

        $stmt = $db->query("SELECT * FROM students WHERE id = $id");

        if ($stmt && $stmt->num_rows > 0) {
            return $stmt->fetch_object();
        }

        return null;
    }
}

?>