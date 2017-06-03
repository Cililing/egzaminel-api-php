<?php

require_once '../../unused/include/DB_Functions.php';
$db = new DB_Functions();

$error = array("error" => true);

if (isset($_POST['user_id'])) {

    $user_id = $_POST['user_id'];
    $response = $db->getUserGroupsById($user_id);
    echo $response;
}


else {
    echo json_encode($error);
}

?>