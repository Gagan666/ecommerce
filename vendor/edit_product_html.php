<?php

include "menu.php";
include_once "../shared/connection.php";

include "vendor_session.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>

<body>
      <?php
     // include 'menu.php';
      $pid = $_GET['pid'];
      // $vname=$_GET['vname'];

      $query = "SELECT * from product where pid=$pid";
      $sql_obj = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($sql_obj);
      $details = $row['details'];
      $impath = $row['impath'];
      $name = $row['name'];
      ?>
      <div class="d-flex justify-content-center align-items-center  vh-100">
            <form method="post" enctype="multipart/form-data" class="text-center w-25 p-3 bg-warning" action="edit_product_php.php?vname=<?php echo $name ?> ">
                  <h3 class="text-center">Edit product</h3>
                  <input type="text" class="form-control mt-3" value='<?php echo "$row[name]" ?>' placeholder="enter name" name="name" required>
                  <input type="text" class="form-control mt-3" value='<?php echo "$row[price]" ?>' placeholder="enter price" name="price" required>
                  <textarea class="form-control mt-3" cols="50" rows="5" name="details"><?php echo $details ?></textarea>
                  <img width='200px' class='mt-2' src='../image/<?php echo $impath ?>'>

                  <input type="file" class="form-control mt-3" value='<?php echo "$row[impath]" ?>' accept=".jpg" placeholder="enter desc" name="imname" required>
                  <label for='img' class='mt-3 form-control btn btn-primary forlabel'>Select Another Image</label>

                  <input type="submit" value="edit" class="mt-3 text-center btn btn-success">
            </form>
      </div>
</body>
<script>

</script>

</html>