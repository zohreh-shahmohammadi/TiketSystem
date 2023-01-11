<?php
require_once('./loginUsers.php');
require_once("./db_connenction.php");
require_once(".././functions.php");
?>
<?php
$user = new User();

$name = $user->escape_string($_POST['name']);
$email = $user->escape_string($_POST["email"]);
$password_hash = $user->escape_string($_POST["password"]);
$role = $user->escape_string($_POST["role"]);
$register = $user->UserRegisetr($name, $email, $password_hash, $role);
echo "('Registration Successful')";

?>