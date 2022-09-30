<?php
session_start();
  include "vendor_session.php";
include 'menu.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
<body>
      <div class="d-flex justify-content-center align-items-center  vh-100">
            <form method="post" enctype="multipart/form-data" class="text-center w-25 p-3 bg-warning"  action="upload_server.php">
                  <h3 class="text-center">upload product</h3>
                  <input type="text" class="form-control mt-3" placeholder="enter name" name="name" required> 
                  <input type="text" class="form-control mt-3" placeholder="enter price" name="price" required> 
                  <textarea class="form-control mt-3" cols="50" rows="5" placeholder="enter desc" name="details"></textarea>
                  <input type="file" class="form-control mt-3" accept=".jpg" placeholder="enter desc" name="imname" required> 
                  <input type="submit" value="Upload" class="mt-3 text-center btn btn-success">
            </form>
      </div>
</body>
<script>
      
</script>
</html>
