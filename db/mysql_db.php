<?php

class mysql_db_functions extends topics_mysql_db
{
    

    function __construct($host, $user, $password, $base){
        self::$mysqli = new mysqli($host, $user, $password, $base);
        
    }

    public function create_themes_db(){
        if ($this->table_exist('themes_db')){return;}
        self::$mysqli->query(<<<OUT
            CREATE TABLE `forum`.`themes_db` (`id` INT NOT NULL AUTO_INCREMENT , `view_priv` INT NOT NULL , `view_priv_data` TEXT NOT NULL , `write_priv` INT NOT NULL , `write_priv_data` TEXT NOT NULL , `owner` TEXT NOT NULL , `name` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
        OUT);
    }
    public function create_users_db() {
        if ($this->table_exist('users')){return;}
        self::$mysqli->query(<<<OUT
            CREATE TABLE `forum`.`users` (`id` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `password_hash` TEXT NOT NULL , `avatar` TEXT NOT NULL , `lore` TEXT NOT NULL , `sessions` TEXT NOT NULL , `tags` TEXT NOT NULL , UNIQUE `id` (`id`)) ENGINE = InnoDB;    
        OUT);
    }

}
//INSERT Products VALUES ('iPhone 7', 'Apple', 5, 52000)
