<?php
require_once("../../functions/functions.php");
session();
if (isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    header('location:dashboard.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h3> Login </h3>
    <div>
        <form method="POST" action="../../functions/Auth/login.php">
            <fieldset>
                <div class="form-group">
                    <input class="form-control" placeholder="Email" type="text" name="email" autofocus required>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Password" type="password" name="password" required>
                </div>
                <button type="submit" name="login">Login</button>
            </fieldset>
        </form>
    </div>
    </div>
    <?php
    if (isset($_SESSION['message'])) {
    ?>
    <div>
        <?php echo $_SESSION['message']; ?>
    </div>
    <?php
        unset($_SESSION['message']);
    }
    ?>

</body>

</html>