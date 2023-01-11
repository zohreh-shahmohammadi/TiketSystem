<?php
require_once('../../functions/Auth/loginUsers.php');
require_once('../../functions/Auth/classTikets.php');
require_once("../../functions/functions.php");
session();

if (!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    header('location:Loginform.php');
}
$tiket = new Tiket;
if (isset($_GET['myid'])) {
    $rowtiket_id = $tiket->find_tiket_id($_GET["myid"]);
    foreach ($rowtiket_id as $rowtikets_id) {
        $id = $rowtikets_id['id'];
    }
} else {
    header('location:Loginform.php');
}


$answered = $tiket->answer_tiket_show($id);

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
        foreach ($rowtiket_id as $rows) {

            echo $rows['user_name'] . "<br /><br />";
            echo $rows['title'] . "<br /><br />";
            echo $rows['text'] . "<br /><br />";
            if ($rows['status'] == 'Answered') {
                echo '<h3 style="color:green">Answered</h5>';
            } else {
                echo '<h3 style="color:red">Pending</h5>';
            }
            $id = $rows['id'];
        }
        echo '<hr>';
        echo '<br>';


        ?>
        <h3>Yours Answers </h3>
        <?php
        foreach ($answered as $answereds) {
            echo $answereds['user_name'] . "<br /><br />";
            echo $answereds['title'] . "<br /><br />";
            echo $answereds['text'] . "<br /><br />";
        }

        ?>
        <div>
            <form method="POST" action="../../functions/Auth/createAnswer.php?myid=<?php echo $id; ?>">
                <fieldset>
                    <div class="form-group">
                        <input type="text" name="title" placeholder="Title" required />
                    </div>
                    <div class="form-group">
                        <textarea name="text" type="text" placeholder="Answer" required></textarea>
                    </div>
                    <button type="submit">save</button>
                </fieldset>
            </form>
        </div>
    </div>
</body>

</html>