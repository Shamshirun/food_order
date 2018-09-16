<?php
session_start();
require_once('./includes/DbConnection.php');
$message1 = "";
if (isset($_POST) && !empty($_POST)) {
    print_r($_POST);
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = "select * from user where email = '{$user}' limit 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['password'] == $pass) {
                session_unset();
                $_SESSION['userid'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['type'] = $row['type'];
                if ($row['type'] == 0) {
                    $_SESSION['type'] = 0;
                    header("Location: admin/index.php");
                    die();
                }
                if ($row['type'] == 1) {
                    $_SESSION['type'] = 1;
                    header("Location: manager/index.php");
                    die();
                }
                if ($row['type'] == 2) {
                    $_SESSION['type'] = 2;
                    header("Location: customer/index.php");
                    die();
                }
            } else {
                $message1 = "Wrong Password";
            }
        }
    } else {
        $message1 = "User with Email-ID {$user} does not exist";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login to bonAppetit</title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/signin.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <form class="form-signin" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email" class="form-control" name="user" placeholder="Email" required autofocus>
        <input type="password" class="form-control" name="pass" placeholder="Password" required>
        <span style="color:red"><?= $message1 ?></span>
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:20px;">Sign In</button>
            </div>
            <div class="col-md-6"><a class="btn btn-lg btn-info btn-block" href="signup.php" style="margin-top:20px;">Register</a>
            </div>
        </div>
    </form>
</div> <!-- /container -->

<script src="assets/js/jquery-1.9.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
