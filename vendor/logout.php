<?php



include "vendor_session.php";

session_destroy();

header("refresh: 0; url = 'view.php'");
?>