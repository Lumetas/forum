<?php
include ('..\config.php');
include ('..\lib\functions.php');
include ('..\db\user_mysql_db.php');
include ('..\db\search_data.php');
include ('..\db\topics_mysql_db.php');
include ('..\db\mysql_db.php');

$db = new mysql_db_functions($db_host, $db_user, $db_password, $db_name);

if ($db->search_user_data_with_session($_COOKIE['username'], $_COOKIE['session']) == NULL){
    $error = "You can't write here :(";
    include('..\pages\404.php');
    exit();
}

$id = $_POST['id'];
$owner = $_COOKIE['username'];
$message = $_POST['message'];
$db->send_message($id, $owner, $message);
header("Location: /topic?id=$id");