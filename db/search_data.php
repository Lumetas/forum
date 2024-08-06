<?php
class search_data extends user_mysql_db{
    public function search_user_data_with_session($name, $session){
        $t = self::$mysqli->query("SELECT * FROM users WHERE sessions LIKE '%" . '"' . $session . '"' . "%' AND name = '$name';");
        return $t->fetch_row();
    }

    public function search_user_data_with_password($name, $password){
        $name = strtolower($this->remove_non_latin_chars($name));
        $password = hash('sha256', $password);
        $t = self::$mysqli->query("SELECT * FROM users WHERE password_hash LIKE '$password' AND name = '$name';");
        return $t->fetch_row();
    }

    protected function table_exist($table_name) : bool {
        $t = self::$mysqli->query("SHOW TABLES like '$table_name';");
        return (bool) $t->fetch_row();
    }
    
    protected function user_exist($username) : bool {
        $t = self::$mysqli->query("SELECT * FROM users WHERE name = '$username';");
        return (bool) $t->fetch_row();
    }

    public function search_topics_by_name($name){
        $name = str_replace(' ', '%', $name);
        $t = self::$mysqli->query("SELECT * FROM themes_db WHERE name LIKE '%$name%';");
        return $t;
    }
    public function search_topics_by_id($id){
        $t = self::$mysqli->query("SELECT * FROM themes_db WHERE id LIKE '%$id%';");
        return $t->fetch_row();
    }

    public function get_topic_messages($id){
        $t = self::$mysqli->query("SELECT * FROM topic_$id;");
        return $t;
    }
}
