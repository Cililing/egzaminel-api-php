<?php

require_once 'include/DB_Insert.php';
$db = new DB_Insert();

$error = array("error" => true);

if (isset($_POST['subject']) AND
    isset($_POST['type']) AND
    isset($_POST['description']) AND
    isset($_POST['teacher']) AND
    isset($_POST['materials']) AND
    isset($_POST['added_by']) AND
    isset($_POST['group_id'])) {

    $subject = $_POST['subject'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $teacher = $_POST['teacher'];
    $materials = $_POST['materials'];
    $added_by = $_POST['added_by'];
    $group_id = $_POST['group_id'];

    $response = $db->insertExam($subject, $type, $description, $teacher, $materials, $added_by, $group_id);
    echo $response;
}

else {
    echo json_encode($error);
}

?>