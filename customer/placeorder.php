<?php
session_start();
require_once('../includes/DbConnection.php');

if (isset($_SESSION['type']) && $_SESSION['type'] === 2) {
} else {
    header("Location:../index.php");
    die();
}
$msg = "";
if (isset($_POST) && !empty($_POST)) {
    $orderid = $_POST['orderno'];
} else if (isset($_GET['order'])) $orderid = $_GET['order'];
$sql = "SELECT * FROM `order_fooditems` join fooditems on order_fooditems.fooditems_id = fooditems.id WHERE order_id = {$orderid} ";
$order = $conn->query($sql);

$sql = "SELECT * from orders where id={$orderid}";
$result = $conn->query($sql);
$details = $result->fetch_assoc();

if (isset($_POST['coupon'])) {
    $sql = "SELECT * from discount where id = {$_POST['coupon']}";
    $coupon = $conn->query($sql);
    $discount = $coupon->fetch_assoc();
    $disc = $discount['percent'] / 100;
} else {
    $sql = "SELECT * from discount where id = {$details['discount_id']}";
    $coupon = $conn->query($sql);
    $discount = $coupon->fetch_assoc();
    $disc = $discount['percent'] / 100;
}

if (isset($_POST['addr'])) {
    $sql = "SELECT * from address where id = {$_POST['addr']}";
    $addr = $conn->query($sql);
    $address = $addr->fetch_assoc();
} else {
    $sql = "SELECT * from address where id = {$details['addressid']}";
    $addr = $conn->query($sql);
    $address = $addr->fetch_assoc();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Edit order</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/dashboard.css" rel="stylesheet">
    <style>
        #newitem {
            padding-right: 10%;
            padding-left: 10%;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">bonAppetit</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"></a></li>
                <li><a href="../logout.php">Logout</a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
            </ul>

        </div>
    </div>
</nav>
<script>
    <?= $msg ?>
</script>
<div class="container">
    <h1>
        <center>Welcome to bonAppetit</center>
    </h1>
    <h3>
        <center>Pamper yourself with the most delicious food items</center>
    </h3>
    <div class="row">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Remarks</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total = 0;
            while ($item = $order->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $item['itemname'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= $item['remarks'] ?></td>
                    <td><?= $item['price'] * $item['quantity'] ?></td>

                </tr>
                <?php
                $total += $item['price'] * $item['quantity'];
            }
            ?>
            <tr>
                <th>TOTAL</th>
                <td></td>
                <td></td>
                <td></td>
                <th><?= $total ?></th>
            </tr>
            <?php
            if (isset($disc)) {
                $disc = $total * $disc;
                $total = $total - $disc;
                ?>
                <tr>
                    <th>Discount</th>
                    <td></td>
                    <td></td>
                    <td><?= $discount['percent'] ?>%</td>
                    <td>-<?= $disc ?></td>
                </tr>
                <tr>
                    <th>AMOUNT</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?= $total ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-4">
                <h3>Shipping Address:</h3>
                <?= $address["name"] ?>
                <br><?= $address["line1"] ?>
                <br><?= $address["line2"] ?>
                <br><?= $address["city"] ?>
                <br>Ph: <?= $address["phone"] ?>
            </div>
            <div class="col-md-8">
                <?php
                if ($details['status'] == 0) {
                    $sql = "UPDATE `orders` SET `discount_id`={$discount['id']},`price`={$total},`addressid`={$address['id']},`status`=1 WHERE `id`={$orderid}";
                    if ($conn->query($sql)) {
                        ?>
                        <h1 style="color:GREEN"> ORDER PLACED</h1>
                        <?php
                    }
                }
                ?>

                <h3>Order Status: <?php
                    switch ($details['status']) {
                        case 0:
                            echo "NOT PROCESSED";
                            break;
                        case 1:
                            echo "PROCESSED";
                            break;
                        case 2:
                            echo "READY";
                            break;
                        case 3:
                            echo "IN TRANSIT";
                            break;
                        case 4:
                            echo "DELIVERED";
                            break;
                    }
                    ?></h3>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery-1.9.0.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../assets/js/holder.min.js"></script>

</body>
</html>
