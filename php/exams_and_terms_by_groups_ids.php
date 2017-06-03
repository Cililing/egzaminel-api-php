<?php

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

$error = array("error" => true);

if (isset($_POST['groups_ids'])) {
	
	$groups_ids = json_decode($_POST['groups_ids']);
    $response = $db->getExamsAndTermsByGroupsIDs($groups_ids);
    echo $response;
}


else {
    echo json_encode($error);
}

?>