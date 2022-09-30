<?php

if (isset($_SESSION['vendor_login']))
{
    if($_SESSION['vendor_login'] == false)
    {
        header("vendor_login_html.php") ;
        die;
    }   
}
else
{
      ?><script>
      alert("Cannot enter without login");
     // window.location='vendor_login_html.php';
      </script><?php
    header('refresh: 0; url ="vendor_login_html.php"');
    die;
}

?>