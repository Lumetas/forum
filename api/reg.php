<?php
include ('../config.php');
include ('../lib/functions.php');
include ('../db/user_mysql_db.php');
include ('../db/search_data.php');
include ('../db/topics_mysql_db.php');
include ('../db/mysql_db.php');

$db = new mysql_db_functions($db_host, $db_user, $db_password, $db_name);

$session = $db->add_user($_POST['login'], $_POST['password']);

setcookie('session', $session, time()+31556926, '/');
setcookie('username', strtolower($db->remove_non_latin_chars($_POST['login'])), time()+31556926, '/');
header("Location: /");