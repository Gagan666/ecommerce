<?php

//include "vendor_session.php";
//include_once "../Shared/connection.php";
//include "menu.php";
include_once "../shared/connection.php";

include "vendor_session.php";


$old_name = $_GET['vname'];

            $name = $_POST['name'];
            //$address=$_POST['address'];
            $price = $_POST['price'];
            $details = $_POST['details'];

            if (isset($_FILES['imname'])) {
                $img = $_FILES['imname'];
                $tmp_name = $img['tmp_name'];
                $error = $img['error'];
                if ($error) {
                    echo "<script>alert('Upload failed, please try again')</script>";
                    header('refresh: 0; url = "view_stadium.php"');
                    die;
                }

                $old_jpg_name = $old_name . ".jpg";
                unlink("../image/$old_jpg_name");
                $jpg_name = $name . ".jpg";
                move_uploaded_file($tmp_name, "../image/$jpg_name");
            } else {
                $old_jpg_name = $old_name . ".jpg";
                $jpg_name = $name . ".jpg";
                rename("../image/$old_jpg_name", "../image/$jpg_name");
            }

            $query = "UPDATE product set name = '$name', impath = '$jpg_name', price='$price' ,details='$details' where name = '$old_name';";
            $result = mysqli_query($conn, $query);



            if ($result == true) {
            ?><script>
        alert('product updated!')
    </script><?php
                header("refresh: 0; url = 'view.php'");
            } else {
                ?><script>
        alert('Could not update the product due to unknown error, please try again!')
    </script><?php
                header('refresh: 0; url = "view.php"');
                die;
            }

                ?>