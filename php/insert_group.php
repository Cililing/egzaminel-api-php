<?php

require_once 'include/DB_Insert.php';
$db = new DB_Insert();

$error = array("error" => true);

if (isset($_POST['name']) AND isset($_POST['password']) AND isset($_POST['description']) AND isset($_POST['added_by'])) {

    $username = $_POST['name'];
    $password = $_POST['password'];
    $description = $_POST['description'];
    $added_by = $_POST['added_by'];

    $response = $db->inserGroup($username, $password, $description, $added_by);
    echo $response;
}


else {
    echo json_encode($error);
}

?>