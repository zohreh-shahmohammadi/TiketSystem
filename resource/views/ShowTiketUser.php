<?php
require_once('../../functions/Auth/loginUsers.php');
require_once('../../functions/Auth/classTikets.php');
require_once("../../functions/functions.php");
require_once('../../functions/Auth/classAnswers.php');

session();
if (!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    header('location:Loginform.php');
}


$tiket = new Tiket;
$rowtiket = $tiket->ShowTiketByUser($tiket);

$user = new User();
$row = $user->get_user_id();
if ($row['role'] == 'support') {
    header('location:dashboard.php');
}

$show_answers = new Answers();
$rowanswer = $show_answers->find_answers_user_id($show_answers);
foreach ($rowanswer as $show_answers) {
    $show_answers_id = $show_answers['id'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP Tiket </title>
</head>

<body>
    <h1 class="page-header text-center">Lsit Of Tiket</h1>
    <div>
        <h2 style="color:orange">list Of Tikets </h2>
        <h4>Tiket Info: </h4>
        <?php
        foreach ($rowtiket  as $rows) {
            echo $rows['user_name'] . "<br /><br/>";


            echo $rows['title'] . "<br /><br />";
            echo $rows['text'] . "<br /><br />";
            $id = $rows['id'];
        ?>
        <?php
            if ($rows['status'] == 'pending') {
                echo '<h2 style="color:red">';
                echo $rows['status'] . "<br /><br />";
                echo   '</h2>';
            } else {
            ?>
        <strong> <a
                href="PageAnswer.php?myid=<?php echo $show_answers_id; ?>"><?php echo $rows['status'] ?></a></strong>
        <?php
            }
            ?>

        <?php
        }
        ?>

    </div>
</body>

</html>