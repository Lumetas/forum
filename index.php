<?php
include ('./config.php');
include ('./lib/functions.php');
include ('./db/user_mysql_db.php');
include ('./db/search_data.php');
include ('./db/topics_mysql_db.php');
include ('./db/mysql_db.php');

$db = new mysql_db_functions($db_host, $db_user, $db_password, $db_name);

if (isset($argv) && isset($argv[1])){
    switch ($argv[1]) {
        case 'init':
            $db->create_themes_db();
            $db->create_users_db();
            break;

        case 'test':
            var_dump($db->search_user_data($argv[2], $argv[3]));
            break;
    }
    exit();
}
$url = explode('?',$_SERVER['REQUEST_URI']);

if (isset($_GET['error'])){
    $error = $_GET['error'];
}

include('templates.php');

if ($url[0] == '/'){
    include("./pages/index.php");
    exit();
}

if (!file_exists('./pages' . $url[0] . '.php')){
    $error = "The page was not found :(";
    include('./pages/404.php');
    exit();
}

include('./pages' . $url[0] . '.php');
?>

