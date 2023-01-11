<?php
session_start();
require_once('./loginUsers.php');
require_once('../../functions/functions.php');

$user = new User();
if (isset($_POST['login'])) {
    $email = $user->escape_string($_POST['email']);
    $password_hash = $user->escape_string($_POST['password']);

    $auth = $user->check_login($email, $password_hash);


    if (!$auth) {
        $_SESSION['message'] = 'Invalid email or password';
        redirect_to('../../resource/views/Loginform.php');
    } else {
        $_SESSION['user'] = $auth;
        $sql = "SELECT * FROM users WHERE id = '" . $_SESSION['user'] . "'";
        $row = $user->details($sql);
        if ($row['role'] == 'user') {
            redirect_to('../../resource/views/dashboard.php');
        } else {
            redirect_to('../../resource/views/support.php');
        }
    }
} else {
    $_SESSION['message'] = 'You need to login first';
    redirect_to('../../resource/views/Loginform.php');
}