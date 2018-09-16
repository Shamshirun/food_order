<?php
ini_set('display_errors', 1);
session_start();
require_once('./includes/DbConnection.php');
$message1 = "";
$message2 = "";
if (isset($_POST) && !empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $conpass = $_POST['conpass'];
    if ($pass == $conpass) {
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO `user`(`name`,`email`,`password`, `type`) VALUES( \"$name\", \"$email\", \"$pass\", 2)";
        if ($conn->query($sql) === TRUE) {
            $message2 = "Account created successfully. Click login to login";
        } else {
            $message1 = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $message1 = "Passwords did not Match, Please Try Again";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bonAppetit</title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/signup.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <form class="form-signin" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2 class="form-signin-heading">Welcome To bonAppetit</h2>
        <h3 class="form-signin-heading">Signup for the best Food in town at your Doorstep.</h3>
        <input type="text" class="form-control" name="name" placeholder="Full Name" required autofocus>
        <input type="email" class="form-control" name="email" placeholder="Email address" required>
        <input type="password" class="form-control" name="pass" placeholder="Password" required>
        <input type="password" class="form-control" name="conpass" placeholder="Confirm Password" required>
        <span style="color:red"><?= $message1 ?></span>
        <span style="color:green"><?= $message2 ?></span>
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:20px;">Sign Up</button>
            </div>
            <div class="col-md-6"><a class="btn btn-lg btn-info btn-block" href="index.php" style="margin-top:20px;">Log
                    in</a></div>
        </div>
    </form>
</div>
<script src="assets/js/jquery-1.9.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>