<?php

class DB_Insert {

    private $conn;

    function __construct() {
        require_once 'DB_Connect.php';
        $db = new DB_connect();
        $this->conn = $db->connect();
    }

    function __destruct() {
    }

    public function inserGroup($name, $password, $description, $added_by) {

        $stmt_insert = $this->conn->prepare
        ('INSERT INTO groups(name, password, description, added_by)
          VALUES(?, ?, ?, ?)'
        );

        $stmt_insert->bind_param("sssi", $name, $password, $description, $added_by);
        $stmt_insert->execute();

        return $this->getResult($stmt_insert);
    }

    public function insertExam($subject, $type, $description, $teacher, $materials, $added_by, $group_id) {

        $stmt_insert = $this->conn->prepare
        ('INSERT INTO exams(subject, type, description, teacher, materials, added_by, group_id)
          VALUES(?, ?, ?, ?, ?, ?, ?)'
        );

        $stmt_insert->bind_param("sssssii", $subject, $type, $description, $teacher, $materials, $added_by, $group_id);
        $stmt_insert->execute();

        return $this->getResult($stmt_insert);

    }

    public function insertTerm($exam_id, $date, $place) {

        $stmt_insert = $this->conn->prepare
        ('INSERT INTO terms(exam_id, date, place)
          VALUES(?, ?, ?)'
        );

        $stmt_insert->bind_param("iss", $exam_id, $date, $place);
        $stmt_insert->execute();

        return $this->getResult($stmt_insert);

    }

    private function getResult($stmt_insert) {

        $result_arr = array();
        $result_arr['error'] = true;

        if ($stmt_insert->insert_id) {
            $result_arr['error'] = false;
            $result_arr['id'] = $stmt_insert->insert_id;
        }

        $result = json_encode($result_arr);
        return $result;
    }


}

?>