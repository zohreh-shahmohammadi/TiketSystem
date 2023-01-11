<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
</head>

<body>
    <form method="POST" action="../../functions/Auth/Register.php">
        <fieldset>
            <div class="form-group">
                <input type="text" name="name" placeholder="Name" required />
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Email" type="text" name="email" autofocus required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Password" type="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="text" name="role" placeholder="Role" required />
            </div>
            <button type="submit" name="register">Register</button>
        </fieldset>
    </form>
</body>

</html>