<?php
include ('../config.php');
include ('../lib/functions.php');
include ('../db/user_mysql_db.php');
include ('../db/search_data.php');
include ('../db/topics_mysql_db.php');
include ('../db/mysql_db.php');

$db = new mysql_db_functions($db_host, $db_user, $db_password, $db_name);
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
if ($db->search_user_data_with_session($_COOKIE['username'], $_COOKIE['session']) == NULL){
    $error = "You can't do this :(";
    include('../pages/404.php');
    exit();
}
$themename = $_POST['name'];

if ($db->remove_non_latin_chars($themename) == ""){
    header("Location: /");
    exit();
}

$viewpriv = $_POST['view'];
if ($viewpriv == "2" || $viewpriv == "3"){
    $viewprivd = $_POST['view1'];
}
else {
    $viewprivd = "";
}
$writepriv = $_POST['write'];
if ($writepriv == "2" || $writepriv == "3"){
    $writeprivd = $_POST['write1'];
}
else{
    $writeprivd = "";
}
$owner = $_COOKIE['username'];

$id = $db->add_topic($themename, $viewpriv, $viewprivd, $writepriv, $writeprivd, $owner);
header("Location: /topic?id=$id");
