<?php

class Login_model extends CI_Model
{

    public function login($username, $password)
    {
        $sql = "SELECT * FROM users
                WHERE username = ? AND password = ? ";
        return $this->db->query($sql, array($username, $password));
    }

    public function check_username($username)
    {
        $sql = "SELECT users.username
                FROM users
                WHERE BINARY users.username = ?;";
        return $this->db->query($sql, array($username));
    }
}
