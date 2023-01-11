<?php
require_once('../../functions/Auth/loginUsers.php');
require_once('../../functions/Auth/classTikets.php');
require_once("../../functions/functions.php");
session();
if (!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    header('location:Loginform.php');
}


$tiket = new Tiket;
$rowtiket = $tiket->index($tiket);

$user = new User();
$row = $user->get_user_id();
if ($row['role'] == 'user') {
    header('location:dashboard.php');
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
        <strong> <a href="PageTiket.php?myid=<?php echo $id; ?>">Reply</a></strong>
        <?php
        }
        ?>
    </div>
</body>

</html>