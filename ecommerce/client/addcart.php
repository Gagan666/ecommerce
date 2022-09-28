<?php
include("../shared/connection.php");

$cid = $_SESSION['user'];
$pid = $_POST['pid'];
$qty = $_POST['qty'];
$sql = "insert into cart (pid,cid,qty) values ($pid,$cid,$qty)";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));



header('location:index.php');
