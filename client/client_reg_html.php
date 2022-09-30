<?php

//include "menu.php";

?>

<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>client Booking Register</title>

    </head>
    <body>

        <div class="d-flex justify-content-center align-items-center vh-100">
            <form action="client_reg_php.php" method="post" class="w-25 bg-warning p-4 text-center">
                <h2>client Register</h2>
                <input type="text" name="name" placeholder="Enter Name" class="mt-3 form-control">
                <input type="text" name="mobile" placeholder="Enter Mobile" maxlength="10" class="mt-3 form-control" required>
                <input type="text" name="email" placeholder="Enter Email" class="mt-3 form-control" required>
                
                <input type="password" name="password" placeholder="Enter Password" class="mt-3 form-control" required>
                <input type="password" name="con_pass" placeholder="Confirm Password" class="mt-3 form-control" required>
                <textarea placeholder="Enter Address" name="address" class="mt-3 form-control" required></textarea>
                <input type="submit" name="save" value="Register" class="mt-3 form-control btn btn-success">
            </form>
        </div>
    </body>
</html>
