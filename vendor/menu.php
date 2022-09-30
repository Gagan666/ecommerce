
<?php
//session_start();
// include "vendor_session.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <style>
            .parentmenu{
                  display:flex;
                  justify-content:start;
                  gap:30px;
            }
            .parentmenu div
            {
            
            }
            .parentmenu a{
                 color:inherit; 
                 text-decoration:none;
                 padding:10px;
                 border-radius:4px;
            }
            .parentmenu a:hover
            {
                  background-color:yellow;
            }
      </style>
</head>
<body>
      <div class='parentmenu bg-primary p-4 text-white w-100'>
            <div class='ml-4'>
                  <a href='upload.php'>upload product</a>
            </div>
            <div>
                  <a href='view.php'> view product</a>
            </div>
            <div>
                  <a href='order.php'> view orders</a>
            </div>
      
      <div>
      <a href='logout.php'> logout</a>
      </div>
      </div>
</body>
</html>