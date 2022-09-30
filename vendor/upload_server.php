<?php
 session_start();
 include "vendor_session.php";


// $src_path=$_FILES['imname']['tmp_name'];
// date_default_timezone_set("Asia/kolkata");
// $unique=date("YmdHis").".jpg";
// $imname=$_FILES['imname']['name'];
// $dest_path="../image/$unique";
// move_uploaded_file($src_path,$dest_path);
$name=$_POST['name'];
$price=$_POST['price'];
$details=$_POST['details'];
$img=$_FILES['imname'];
$tmp_name=$img['tmp_name'];
$error = $img['error'];
if($error)
{
    ?><script>alert('Upload failed, please try again')</script><?php
    header('refresh: 0; url = "upload.php"');
    die;
}
$jpg_name=$name.".jpg";
move_uploaded_file($tmp_name, "../image/$jpg_name");

include_once "../shared/connection.php";
$conn=new mysqli('localhost','root','','acme_proj');

$cmd="insert into product(name,price,details,impath) values ('$name',$price,'$details','$jpg_name')";
//echo "<br> $cmd";
$sql_status=mysqli_query($conn,$cmd);
if(!$sql_status)
{
      echo "wrong query";
      die;
}
else{
     ?><script> alert("successfully added")</script><?php
      header('refresh: 0; url ="menu.php"');
    die;
}
?>