<?php

if (isset($_SESSION['client_login']))
{
    if($_SESSION['client_login'] == false)
    {
        header("client_login_html.php") ;
        die;
    }   
}
else
{
      ?><script>
      alert("Cannot enter without login");
     // window.location='vendor_login_html.php';
      </script><?php
    header('refresh: 0; url ="client_login_html.php"');
    die;
}

?>