<?php

require_once 'include/DB_Insert.php';
$db = new DB_Insert();

$error = array("error" => true);

if (isset($_POST['exam_id']) AND isset($_POST['date']) AND isset($_POST['place'])) {

    $exam_id = $_POST['exam_id'];
    $date = $_POST['date'];
    $place = $_POST['place'];

    $response = $db->insertTerm($exam_id, $date, $place);
    echo $response;
}


else {
    echo json_encode($error);
}

?>