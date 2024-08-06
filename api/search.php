<?php
include ('..\config.php');
include ('..\lib\functions.php');
include ('..\db\user_mysql_db.php');
include ('..\db\search_data.php');
include ('..\db\topics_mysql_db.php');
include ('..\db\mysql_db.php');

$db = new mysql_db_functions($db_host, $db_user, $db_password, $db_name);

$a = $db->search_topics_by_name($_GET['q']);
$arr = [];
foreach ($a as $row) {
    $arr[] = (object) array('id' => $row['id'], 'name' => $row['name'], 'owner' => $row['owner']);
}

echo json_encode($arr);