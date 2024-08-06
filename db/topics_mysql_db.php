<?php
class topics_mysql_db extends search_data{
    public function add_topic($topic, $view_priv, $view_priv_data, $write_priv, $write_priv_data, $owner) : int{
        self::$mysqli->query("INSERT INTO themes_db (name, view_priv, view_priv_data, write_priv, write_priv_data, owner) VALUES ('$topic', $view_priv, '$view_priv_data', $write_priv, '$write_priv_data', '$owner')");
        $id = self::$mysqli->insert_id;
        self::$mysqli->query("CREATE TABLE `forum`.`topic_$id` (`id` INT NOT NULL AUTO_INCREMENT , `owner` TEXT NOT NULL , `message` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
        return $id;
    }

    public function send_message($id, $owner, $message){
        self::$mysqli->query("INSERT INTO topic_$id (owner, message) VALUES ('$owner', '$message')");
    }


}
