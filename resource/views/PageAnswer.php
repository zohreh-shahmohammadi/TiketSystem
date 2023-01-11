<?php

require_once('../../functions/Auth/classTikets.php');
require_once('../../functions/Auth/loginUsers.php');
require_once("../../functions/functions.php");

session();
if (!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    header('location:Loginform.php');
}

$tiket_id = new Tiket;
$rowtiket_id = $tiket_id->find_tikets_tiket_id_in_answers($tiket_id);

if (isset($_GET['myid'])) {
    $answers = new Answers();
    $row_answer = $answers->find_tiket_id($_GET["myid"]);
} else {
    header('location:Loginform.php');
}

$user = new User();
$row = $user->get_user_id();
if ($row['role'] == 'support') {
    header('location:dashboard.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP Tiket </title>
</head>

<body>
    <div>
        <h2 style="color:orange">list Of Tikets </h2>
        <h4>Tiket Info: </h4>
        <?php
        foreach ($rowtiket_id as $sqls) {
            echo $sqls['user_name'] . "<br /><br/>";
            echo $sqls['title'] . "<br /><br />";
            echo $sqls['text'] . "<br /><br />";
            echo "<p>tiket_id : </p>" . $id = $sqls['id'];
        }

        ?>
    </div>
    <hr>
    <h1 class="page-header text-center">Lsit Of Tiket</h1>
    <div>
        <h2 style="color:red">list Of Answer </h2>
        <h4 style="color:blueviolet">Answer Info: </h4>
        <?php
        foreach ($row_answer as $sqls) {
            echo $sqls['user_name'] . "<br /><br/>";
            echo $sqls['title'] . "<br /><br />";
            echo $sqls['text'] . "<br /><br />";
            echo "<p>tiket_id : </p>" . $sqls['tiket_id'] . "<br /><br />";
            $id = $sqls['id'];
        }
        ?>
    </div>


</body>

</html>