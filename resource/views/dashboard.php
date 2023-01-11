<?php
require_once('../../functions/Auth/loginUsers.php');
session_start();
if (!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    header('location:Loginform.php');
}
$user = new User();
$row = $user->get_user_id();

?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP Login </title>
</head>

<body>
    <h1 class="page-header text-center">you are login </h1>
    <div>
        <?php
        if ($row['role'] == 'support') {
            echo '<a href="showTiket.php">ShowTiket</a>';
            echo '   <h2 style="color:green">You are Support </h2>';
        } elseif ($row['role'] == 'user') {
            echo '<a href="TiketForm.php">New Tiket</a>';
            echo '<br>';
            echo '<a href="showAnswers.php">Show Answers</a>';
            echo '<br>';
            echo '<a href="ShowTiketUser.php">Show Tiket User</a>';
            echo '   <h2 style="color:green">You are User </h2>';
        }
        ?>


        <h4>User Info: </h4>
        <p>Name: <?php echo $row['name']; ?></p>
        <p>Username: <?php echo $row['email']; ?></p>
        <p>Password: <?php echo $row['password']; ?></p>
        <p>ROLE: <?php echo $row['role']; ?></p>
        <a href="../../functions/Auth/logout.php">Logout</a>
    </div>
</body>

</html>