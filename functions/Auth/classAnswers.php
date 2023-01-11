<?php
require_once("loginUsers.php");
require_once('classTikets.php');
session_start();
class Answers extends DbConnection
{

    function __construct()
    {

        parent::__construct();
    }
    public function escape_string($value)
    {

        return $this->connection->real_escape_string($value);
    }
    public function CreateAnswer($user_id, $user_name, $tiket_id, $support_name, $title, $text)
    {
        $query = "INSERT INTO answers (";
        $query .= "user_id,user_name,tiket_id,support_name,title,text";
        $query .= ") VALUES(";
        $query .= "'{$user_id}','{$user_name}','{$tiket_id}','{$support_name}','{$title}' ,'{$text}'";
        $query .= ")";
        $result = $this->connection->query($query);
        return $result;
    }
    public function updated_tiket_status($id)
    {
        $sql = "UPDATE tikets SET status='Answered' WHERE id=$id";
        $result = $this->connection->query($sql);
        return $result;
    }

    public function find_answers_user_id()
    {

        $user = new User();
        $sql = "SELECT * FROM users WHERE id = '" . $_SESSION['user'] . "'";
        $row = $user->details($sql);
        $id = $row['id'];

        $tiket_id =  "SELECT * ";
        $tiket_id  .= "FROM answers ";
        $tiket_id .= "WHERE user_id = {$id} ";
        $answers = $this->connection->query($tiket_id);
        return $answers;
    }
    public function find_tiket_id($id)
    {
        $tiket_id =  "SELECT * ";
        $tiket_id  .= "FROM answers ";
        $tiket_id .= "WHERE id = {$id} ";
        $result = $this->connection->query($tiket_id);
        return $result;
    }
}