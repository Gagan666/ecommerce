<?php

include_once '../shared/connection.php';
include "vendor_session.php";

//include '../shared/connection.php';
$pid = $_GET['pid'];
$cmd = "DELETE from product where pid=$pid";

$sql_status = mysqli_query($conn, $cmd);

if (!$sql_status) {
      echo "wrong query";
      die;
} else {
?><script>
            alert("successfully deleted")
      </script><?php
                  header('refresh: 0; url ="view.php"');
                  die;
            }
                  ?>