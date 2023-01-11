<?php
require_once('../../functions/Auth/classTikets.php');
require_once('../../functions/Auth/loginUsers.php');

session_start();
if (!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    header('location:Loginform.php');
}

$user = new User();
$row = $user->get_user_id();
if ($row['role'] == 'support') {
    header('location:dashboard.php');
}
$tiket = new Tiket();
$tiket->ShowTiketByUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Tiket</title>
</head>

<body>
    <form method="POST" action="../../functions/Auth/createTiket.php">
        <fieldset>
            <div class="form-group">
                <input type="text" name="title" placeholder="Title" required />
            </div>
            <div class="form-group">
                <textarea name="text" type="text" placeholder="Tiket" required></textarea>
            </div>

            <button type="submit" name="tiket">save</button>
        </fieldset>
    </form>
</body>

</html>