<?php

include "menu.php";

include_once "../shared/connection.php";

if (isset($_SESSION['status_cart'])) {
      echo "<script>alert('" . $_SESSION['status_cart'] . "')</script>";
      unset($_SESSION['status_cart']);
}

?>
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
      <?php
      $mysqli_obj = mysqli_query($conn, "select * from product");

      while ($row = mysqli_fetch_assoc($mysqli_obj)) {
            // print_r($row);
            // echo "<br>";
            $pid = $row['pid'];
            $name = $row['name'];
            $price = $row['price'];
            $impath = $row['impath'];
            $details = $row['details'];
            echo "
            <div class='parent'>
            <form action='addcart.php' method='post'>
                  <img class='image' src='../image/$impath' alt='Card image'>
                  <div class='card-body'>
                        <input type='hidden' name='pid' value='$pid'/>
                      <h4 class=''>$name  <span class='text-danger'>$price Rs </span></h4>
                      <p class='card-text'>$details</p>
                      <div class='d-flex justify-content-between'> 
                      <i class='fa fa-shopping-cart' style='background-color:#f0ad4e;'>                
                       <input type='submit' class='btn btn-warning' value='Add to cart'/> </i> 
                      <label for='qty'>QTY</label>
                      <input type='number' name='qty' style='width:50px;' min='1' value='1'/>
                      </div>
                  </div>
                  </form>
              </div>
              
              ";
      }
      ?>

</body>

</html>