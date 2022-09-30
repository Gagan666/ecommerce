<?php

include_once "../shared/connection.php";
//include "vendor_session.php";

$mobile = $_POST['mobile'];
$pass1 = $_POST['password'];

$query = "SELECT * from client where cmobile = $mobile;";
$sql_obj = mysqli_query($conn, $query);
$isExist = mysqli_num_rows($sql_obj);

if ($isExist == 1) {
    $row = mysqli_fetch_assoc($sql_obj);
    $pass2 = $row['pass'];

    if ($pass2 == $pass1) {
?><script>
            alert("User Login Successful!");
        </script><?php


                    $_SESSION['client_login'] = true;
                    $sql_obj = mysqli_query($conn, "SELECT * from client where cmobile=$mobile;");
                    $row = mysqli_fetch_assoc($sql_obj);
                    $uid = $row['cid'];
                    $_SESSION['user'] = $uid;
                    header('location:index.php');
                } else {
                    ?><script>
            alert("Password Incorrect, please enter the correct password!");
            window.location = 'client_login_html.php';
        </script><?php
                }
            } else {
                    ?>
    <script>
        alert("Number not registered, please register!");
        window.location = 'client_login_html.php';
    </script>
<?php
            }

?>