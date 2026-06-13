<?php

class employee
{
    public $id;
    public $name;
    public $phone;
    public $department;
    public $designation;
    public $salary;

    public function __construct($_id, $_name, $_phone, $_department, $_designation, $_salary)
    {
        $this->id = trim($_id);
        $this->name = trim($_name);
        $this->phone = trim($_phone);
        $this->department = trim($_department);
        $this->designation = trim($_designation);
        $this->salary = trim($_salary);
    }

    // Insert
    public function save()
    {
        global $db;

        $db->query("
            INSERT INTO employees
            (name, phone, department, designation, salary)
            VALUES
            ('$this->name', '$this->phone', '$this->department', '$this->designation', '$this->salary')
        ");

        return "Saved Successfully";
    }

    // Select All
    public static function all()
    {
        global $db;

        $result = $db->query("SELECT * FROM employees");

        $employees = [];

        while ($row = $result->fetch_object()) {
            $employees[] = $row;
        }

        return $employees;
    }

    // Find By ID
    public static function find($id)
    {
        global $db;

        $result = $db->query("SELECT * FROM employees WHERE id='$id'");

        return $result->fetch_object();
    }

    // Delete
    public static function delete($id)
    {
        global $db;

        $db->query("DELETE FROM employees WHERE id='$id'");

        return "Deleted Successfully";
    }

    // Update
    public function update()
    {
        global $db;

        $db->query("
            UPDATE employees SET
            name='$this->name',
            phone='$this->phone',
            department='$this->department',
            designation='$this->designation',
            salary='$this->salary'
            WHERE id='$this->id'
        ");

        return "Updated Successfully";
    }
}
?>