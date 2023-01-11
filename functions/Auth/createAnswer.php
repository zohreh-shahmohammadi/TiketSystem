<?php
session_start();

require_once('.././Auth/loginUsers.php');
require_once('./classAnswers.php');
require_once('./classTikets.php');
require_once(".././functions.php");

$user = new User();
$row = $user->get_user_id();

$answers = new Answers();

$tiket_name = new Tiket();
$rowtiket_id = $tiket_name->find_tiket_id($_GET["myid"]);
foreach ($rowtiket_id as $rows) {
    $tiket_id = $rows['id'];
}

$updated_tiket_status = $answers->updated_tiket_status($tiket_id);



foreach ($rowtiket_id as $rows) {
    $user_id = $_SESSION['user_id'] =  $rows['user_id'];
    $user_name = $_SESSION['user_name'] =  $rows['user_name'];
    $tiket_id = $_SESSION['tiket_id'] =  $rows['id'];
}
$support_name = $_SESSION['support_name'] = $row['name'];
$title = $answers->escape_string($_POST['title']);
$text = $answers->escape_string($_POST['text']);
$query = $answers->CreateAnswer($user_id, $user_name, $tiket_id, $support_name, $title, $text);
echo json_encode($query);