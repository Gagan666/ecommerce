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


<?php
include_once '../shared/connection.php';
$cid = $_SESSION['user'];

// $sql = "select * from orders where client_id=$cid";
// $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// $row = mysqli_fetch_assoc($res);
// $status = $row['status'];
// echo "$status";
// if ($status == 0)
//     echo "<h2>Your order is placed and is waiting for approval by the vendor</h2>";
// else if ($status == 1)
// {
//     echo "<h2>Your order is accepted by the vendor,stay tuned your order is on the way</h2>";
//     die;
// }
// else if ($status == -1)
// {
//     echo "<h2>Your order is rejected by the vendor and your money will be refunded</h2>";
//     die;
// }

$order_pid = "";
$order_qty = "";
$total = 0;

$sql = "select * from cart where cid=$cid";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$ctr = 0;
$oid=0;
//$_SESSION['oid'];

if(mysqli_num_rows($res))
{
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
";}
while ($row = mysqli_fetch_assoc($res)) {
    $pid = $row['pid'];

    $qty = $row['qty'];
    $order_pid .= strval($pid) . ',';
    $order_qty .= strval($qty) . ',';
    $inner_sql = "select * from product where pid=$pid";
    $ctr++;
    $res1 = mysqli_query($conn, $inner_sql) or die(mysqli_error($conn));

    while ($row1 = mysqli_fetch_assoc($res1)) {
        $pname = $row1['name'];
        $price = $row1['price'] * $qty;
        $total += $price;

        $image = $row1['impath'];
        echo "
                    <tr>
                    <th scope='row'>$ctr</th>
                    <td><img class='ord_img' src='../image/$image' alt='Card image'></td>
                    <td>$pname</td>
                    <td>$qty</td>
                    <td>$price</td>
                    </tr>     
        
        ";
    }
}
if(mysqli_num_rows($res))
{
echo "
</tbody>
</table>
<br>
<br>
<h1> Total bill : $total</h1>
";
$sql = "insert into orders (product_id,client_id,qty,status) values('$order_pid',$cid,'$order_qty',0)";
$res1 = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$oid = mysqli_insert_id($conn);
$_SESSION['oid']=$oid;
//echo "$_SESSION['oid']";

$sql2 = "delete from cart where cid=$cid";
$res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
}
$oid=$_SESSION['oid'];
$sql3="select * from orders where oid=$oid";
$res3=mysqli_query($conn, $sql3) or die(mysqli_error($conn));
//echo "$oid";

if(mysqli_num_rows($res3))
{
$row=mysqli_fetch_assoc($res3);
$status=$row['status'];
if($status==0)
echo "<h2>Your order is placed and is waiting for approval by the vendor</h2>";
else 
{
    header('location:status.php');
}
}
?>

</html>