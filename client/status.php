<?php
include 'menu.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <h1>Your Order Status</h1>
    <br>
    <br>
    <style>
        * {
            /* background-color: #E1F8DC; */
        }

        table {
            border-top: 5px solid black;
        }

        h1 {
            text-align: center;
        }

        .ord_img {
            width: 80px;
            height: 80px;
        }


        td {
            text-align: center;
            font-weight: 600;
            font-size: larger;
        }
    </style>
</head>
<body>


<script>

    </script>
    </body>


</html>


<?php
include_once '../shared/connection.php';
$total = 0;
$oid=$_SESSION['oid'];
$sql = "select * from orders where oid=$oid";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$ctr = 0;

$row = mysqli_fetch_assoc($res); 
   // $cid = $row['client_id'];
   // $oid = $row['oid'];
    echo "
<table class='table table-striped'>
<thead>
    <tr style='font-size:25px;text-align:center;'>
    <th scope='col'>#</th>
    <th scope='col'>Product Image</th>
    <th scope='col'>Product Name</th>
    <th scope='col'>Quantity</th>
    <th scope='col'>Total Price</th>
    </tr>
</thead>
<tbody>
";
    $pid = $row['product_id'];
    $qty = $row['qty'];
    $pid = explode(',', $pid);
    $qty = explode(',', $qty);

    // print_r($pid);
    // die();
    for ($i = 0; $i < count($pid) - 1; $i++) {
        $inner_sql = "select * from product where pid=$pid[$i]";
       $ctr++;
        $res1 = mysqli_query($conn, $inner_sql) or die(mysqli_error($conn));

        while ($row1 = mysqli_fetch_assoc($res1)) {
            $pname = $row1['name'];
            $price = $row1['price'] * $qty[$i];
            $total += $price;
            $image = $row1['impath'];
            echo "
                    <tr>
                    <th scope='row'>$ctr</th>
                    <td><img class='ord_img' src='../image/$image' alt='Card image'></td>
                    <td>$pname</td>
                    <td>$qty[$i]</td>
                    <td>$price</td>
                    </tr>     
        
        ";
        }
      }
    echo "
</tbody>
</table>
<br>
<br>
<h1> Total bill : $total</h1>

";

$status=$row['status'];
if ($status == 1)
{
    echo "<h2>Your order is accepted by the vendor , stay tuned your order is on the way</h2>";

    //header('location:status.php');
}
else if ($status == -1)
{
    echo "<h2>Your order is rejected by the vendor and your money will be refunded</h2>";

   // header('location:status.php');
}

?>