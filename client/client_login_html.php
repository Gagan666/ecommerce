<?php

//include "menu.php";

?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>client Login</title>

</head>

<body>

    <div class="d-flex justify-content-center align-items-center align-self-center vh-100">
        <form action="client_login_php.php" method="post" class="w-25 bg-warning p-4 text-center">
            <h2>CLIENT LOGIN</h2>
            <input type="text" maxlength="10" name="mobile" placeholder="Enter Mobile" class="mt-3 form-control" required>
            <input type="password" name="password" placeholder="Enter Password" class="mt-3 form-control" required>
            <input type="submit" name="login" value="Login" class="mt-3 form-control btn btn-success">
            <h6 class="mt-3"><a href="client_reg_html.php"> Not registered yet? </a></h6>
        </form>
    </div>
</body>

</html>