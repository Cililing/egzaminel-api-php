<?php

require_once 'include/DB_SimpleLogin.php';
$db = new DB_SimpleLogin();

$error = array("error" => true);

if (isset($_POST['username']) AND isset($_POST['password']) AND isset($_POST['salt']) AND isset($_POST['facebook_link'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $salt = $_POST['salt'];
    $facebook_link = $_POST['facebook_link'];

    $response = $db->insertUser($username, $password, $salt, $facebook_link);
    echo $response;
}


else {
    echo json_encode($error);
}

?>