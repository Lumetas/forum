<?php
include ('..\config.php');
include ('..\lib\functions.php');
include ('..\db\user_mysql_db.php');
include ('..\db\search_data.php');
include ('..\db\topics_mysql_db.php');
include ('..\db\mysql_db.php');

$db = new mysql_db_functions($db_host, $db_user, $db_password, $db_name);

$user = $db->search_user_data_with_password($_POST['login'], $_POST['password']);
if ($user != NULL){
    var_dump($user);
    $name = strtolower($db->remove_non_latin_chars($_POST['login']));
    $session = $db->gen_rand_string(15);
    $sessions = $user[5];
    $id = $user[0];
    $db->add_user_session($id, $sessions, $session);
    setcookie('session', $session, time()+31556926, '/');
    setcookie('username', $name, time()+31556926, '/');
    header("Location: /");
}
else {
    header("Location: /auth");
}