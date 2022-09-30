<?php

include "../shared/connection.php";
include "client_session.php";

$cid = $_SESSION['user'];
$sql = "select count(*) total from cart where cid=$cid";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($res);
$totalcount = $row['total'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
            .parentmenu {
                  display: flex;
                  justify-content: start;
                  gap: 30px;
            }

            .parentmenu div {}

            .parentmenu a {
                  color: inherit;
                  text-decoration: none;
                  padding: 10px;
                  border-radius: 4px;
            }

            .parentmenu a:hover {
                  background-color: yellow;
            }

            .cart-count-parent {
                  position: relative;
            }

            .cart-count {
                  padding: 5px;
                  background-color: cyan;
                  color: tomato;
                  border-radius: 50%;
                  position: absolute;
                  right: -10px;
                  top: -10px;
            }
      </style>
</head>

<body>
      <div class='d-flex bg-primary p-4 text-white w-100 justify-content-between'>
            <div class='parentmenu'>
                  <div class='ml-4'>
                        <a href='index.php'>view product</a>
                  </div>
                  <div>
                        <a href='cart.php'> view cart</a>
                  </div>
                  <div>
                        <a href='order.php'> view orders</a>
                  </div>
            </div>
            <div class='d-flex'>
                  <div class='cart-count-parent'>
                        <a href='cart.php'>
                              <button class='btn btn-warning '> <i class='bi bi-cart'> </i> ct</button>
                        </a>
                        <span class='cart-count'>
                              <?php echo "$totalcount" ?>
                        </span>
                  </div>
                  <div class='ms-3'>
                        <a href='logout.php'>
                              <button class='btn btn-danger'> <i class='bi bi-box-arrow-right'> </i> logout </button>
                        </a>
                  </div>
            </div>
      </div>
</body>

</html>