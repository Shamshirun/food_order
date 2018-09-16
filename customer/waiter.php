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
    if (isset($_POST['add'])) {
        $itemid = $_POST['itemid'];
            $orderid = $_POST['orderid'];
            $qty = $_POST['qty'];
            $remarks = $_POST['remarks'];
            $sql = "INSERT INTO `order_fooditems`(`order_id`, `fooditems_id`, `quantity`, `remarks`) VALUES ({$orderid},{$itemid},{$qty},'{$remarks}')";
            if ($conn->query($sql)) {
                header("Location: editorder.php?orderid={$orderid}");
            }
            die($conn->error);
        }
    if (isset($_POST['update'])) {
        $itemid = $_POST['itemid'];
        $orderid = $_POST['orderid'];
        $qty = $_POST['qty'];
        $remarks = $_POST['remarks'];
        $sql = "UPDATE `order_fooditems` set `quantity`={$qty}, `remarks`= '{$remarks}' where `order_id`={$orderid} and `fooditems_id`={$itemid}";
        if ($conn->query($sql)) {
            header("Location: revieworder.php?orderid={$orderid}");
        }
        die($conn->error);
    }
}
?>