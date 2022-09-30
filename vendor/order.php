<?php
include 'menu.php';
include_once '../shared/connection.php';
include "vendor_session.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <h1>Client's Order Status</h1>
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

    function checkstatus()
    {
        document.getElementById("removed").innerHTML = "order revieved";

    }
    </script>
    </body>


</html>


<?php
$total = 0;
$sql = "select * from orders";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$ctr = 0;

while ($row = mysqli_fetch_assoc($res)) {
    $cid = $row['client_id'];
    $oid = $row['oid'];
    echo "
        <h3>Client Id :$cid</h3>   
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
<div id='removed'>
<a href='remove_order.php?oid=$oid&status=1' > <button class='btn btn-success' onClick='checkstatus()'>Approve Order</button>  </a>
<a href='remove_order.php?oid=$oid&status=-1'> <button class='btn btn-danger' onClick='checkstatus()'>Reject Order</button>  </a>
</div>
<br>
<br>

";
}

?>