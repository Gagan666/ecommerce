<?php
include_once '../shared/connection.php';
$status = $_GET['status'];
$oid = $_GET['oid'];
$sql = "update orders set status =$status where oid=$oid";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

// echo "
// <script>
// document.getElementById('removed').innerHTML = 'order revieved';

// </script>
// "
header('location:upload.php');

?>
