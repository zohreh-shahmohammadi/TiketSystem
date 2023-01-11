<?php
session_start();
require_once('./classTikets.php');
require_once('./loginUsers.php');
require_once(".././functions.php");

$user = new User();
$row = $user->get_user_id();

$tiket = new Tiket();

if (isset($_POST['tiket'])) {
    $user_id = $_SESSION['user_id'] = $row['id'];
    $user_name = $_SESSION['user_name'] = $row['name'];
    $title = $tiket->escape_string($_POST['title']);
    $text = $tiket->escape_string($_POST['text']);
    $query = $tiket->CreateTiket($user_id, $user_name, $title, $text);
    redirect_to('../../resource/views/TiketForm.php');
} else {
    echo 'create isnt sucessfuli';
}