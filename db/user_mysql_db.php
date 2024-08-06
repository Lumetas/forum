<?php
class user_mysql_db extends More_functions
{
    protected static $mysqli;
    public function add_user($user_name, $password) : string{
        $user_name = strtolower($this->remove_non_latin_chars($user_name));
        if ($this->user_exist($user_name)){
            header("Location: /");
            exit();
        }

        $pass_hash = hash('sha256', $password);
        $session = $this->gen_rand_string(15);
        $sessions = json_encode([$session]);
        self::$mysqli->query("INSERT INTO users (name, password_hash, sessions, avatar, lore, tags) VALUES ('$user_name', '$pass_hash', '$sessions', 'null', 'null', 'null')");
        return $session;
    }

    public function add_user_session($id, $sessions, $session){
        $arr = json_decode($sessions);
        $arr[] = $session;
        $new_sessions = json_encode($arr);
        $t = self::$mysqli->query("UPDATE users SET sessions = '$new_sessions' WHERE id = $id");
    }
}
