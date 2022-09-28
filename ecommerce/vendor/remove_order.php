<?php
include_once '../shared/connection.php';
$status = $_GET['status'];
$oid = $_GET['oid'];
$sql = "update orders set status =$status where oid=$oid";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

header('location:order.php');
