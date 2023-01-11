<?php
require_once("db_connenction.php");
class User extends DbConnection
{
    public function __construct()
    {
        parent::__construct();
    }
    public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
    }
    public function UserRegisetr($name, $email, $password, $role)
    {
        //$salt = "dwt" . random_int(999, 9999) . "5wdg$%@";
        // $password_echo = filter_var($password, FILTER_SANITIZE_STRING);
        //$password_hash = md5($password . $salt . $password_echo);
        $query = "INSERT INTO users(";
        $query .= "name,email,password,role";
        $query .= ") VALUES(";
        $query .= " '{$name}','{$email}','{$password}','{$role}'";
        $query .= ")";
        $result = $this->connection->query($query);
        return $result;
    }

    public function check_login($email, $password_hash)
    {
        // $salt = "dwt" . random_int(999, 9999) . "5wdg$%@";
        // $password_echo = filter_var($password_hash, FILTER_SANITIZE_STRING);
        //$password_hash = md5($password_hash . $salt . $password_echo);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password_hash'";
        $query = $this->connection->query($sql);

        if ($query->num_rows > 0) {
            $row = $query->fetch_array();
            return $row['id'];
        } else {
            return false;
        }
    }
    public function details($sql)
    {
        $query = $this->connection->query($sql);
        $row = $query->fetch_array();
        return $row;
    }
    public function get_user_id()
    {
        $sql = "SELECT * FROM users WHERE id = '" . $_SESSION['user'] . "'";
        $result = $this->details($sql);
        return $result;
    }
}