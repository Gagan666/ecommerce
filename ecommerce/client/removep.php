<?php
include("../shared/connection.php");
$pid=$_GET['pid'];
$cid=$_SESSION['user'];
$sql="delete from cart where pid=$pid and cid=$cid";
$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));



header('location:cart.php');
