<?php
include ('..\config.php');
include ('..\lib\functions.php');
include ('..\db\user_mysql_db.php');
include ('..\db\search_data.php');
include ('..\db\topics_mysql_db.php');
include ('..\db\mysql_db.php');
$id = $_GET['id'];
$db = new mysql_db_functions($db_host, $db_user, $db_password, $db_name);

$a = $db->get_topic_messages($id);
$arr = [];
foreach ($a as $row) {
    $arr[] = (object) array('owner' => $row['owner'], 'message' => $row['message']);
}

echo json_encode($arr);

