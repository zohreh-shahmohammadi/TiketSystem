<?php
require_once("db_connenction.php");
require_once('classAnswers.php');

class Tiket extends DbConnection
{
    function __construct()
    {
        parent::__construct();
    }

    public function escape_string($value)
    {

        return $this->connection->real_escape_string($value);
    }

    public function CreateTiket($user_id, $user_name, $title, $text)
    {
        $query = "INSERT INTO tikets (";
        $query .= "user_id,user_name,title,text";
        $query .= ") VALUES(";
        $query .= " '{$user_id}' , '{$user_name}' , '{$title}' ,'{$text}'";
        $query .= ")";
        $result = $this->connection->query($query);
        return $result;
    }


    public function index()
    {
        $show = "SELECT * FROM tikets";
        $result = $this->connection->query($show);
        return $result;
    }


    public function find_tiket_id($id)
    {
        $tiket_id =  "SELECT * ";
        $tiket_id  .= "FROM tikets ";
        $tiket_id .= "WHERE id = {$id} ";
        $result = $this->connection->query($tiket_id);
        return $result;
    }


    public function find_tikets_tiket_id_in_answers()
    {
        $show_answers = new Answers();
        $rowtiket = $show_answers->find_answers_user_id($show_answers);
        foreach ($rowtiket as $rows) {
            $tiket_id_answer = $rows['tiket_id'];
        }
        $tiket_id =  "SELECT * ";
        $tiket_id  .= "FROM tikets ";
        $tiket_id .= "WHERE id = {$tiket_id_answer} ";
        $result = $this->connection->query($tiket_id);
        return $result;
    }
    public function ShowTiketByUser()
    {
        $user = new User();
        $id = $user->get_user_id($user);
        $user_id =  $id['id'];

        $tiket_user_id =  "SELECT * ";
        $tiket_user_id   .= "FROM tikets ";
        $tiket_user_id  .= "WHERE user_id = {$user_id} ";
        $result = $this->connection->query($tiket_user_id);
        return $result;
    }

    public function answer_tiket_show($id)
    {

        $answer = "SELECT * FROM answers WHERE tiket_id =$id";
        $result = $this->connection->query($answer);
        return $result;
    }
}