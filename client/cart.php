<!DOCTYPE html>
<html lang="en">

<head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

      <style>
            .parent {

                  width: fit-content;
                  padding: 10px;
                  background-color: bisque;
                  display: inline-block;
            }

            .image {
                  width: 300px;
                  height: 200px;
            }
      </style>
</head>

<body>


</body>

</html>


<?php
include 'menu.php';
include_once '../shared/connection.php';


$cid = $_SESSION['user'];
//echo "$cid";
$ctr = 0;
$cmd = "SELECT * from cart where cid =$cid";
$sqlobj = mysqli_query($conn, $cmd);
while ($row = mysqli_fetch_assoc($sqlobj)) {
      // print_r($row);
      // echo "</br>";
      $pid = $row['pid'];
      $qty = $row['qty'];
      $cmd1 = "SELECT * from product where pid =$pid";
      $sqlobj1 = mysqli_query($conn, $cmd1);
      while ($row1 = mysqli_fetch_assoc($sqlobj1)) {
            $ctr++;
            $name = $row1['name'];
            $price = $row1['price'];
            $impath = $row1['impath'];
            $details = $row1['details'];
            echo "
      <div class='parent'>
      <img class='image' src='../image/$impath' alt='Card image'>
      <div class='card-body'>
          <h4 class=''>$name  <span class='text-danger'>$price Rs </span></h4>
          <p class='card-text'>$details</p>
          <p>Quantity: $qty</p>
          <div class='d-flex justify-content-between'>                    
          <a href='removep.php?pid=$pid' > <button class='btn btn-danger'> <i class='fa fa-trash'> </i>  </button>  </a>
          </div>
      </div>
  </div>";
      }
}
if ($ctr) {
      echo "<div'><br> <br></div>";
      echo "<a href='order.php?cid=$cid' > <button type='button' style='width:20%;margin-left:600px'class='btn btn-success'>Order Now</button> </a> ";
} else {
      echo "<h1 style='text-align:center;margin-top:30px;'> No Items present in cart currently </h1>";
}
?>