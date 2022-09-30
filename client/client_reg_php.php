<?php

include '../shared/connection.php';


$name = $_POST['name'];
$mobile = $_POST['mobile'];
$pass1 = $_POST['password'];
$pass2 = $_POST['con_pass'];
$email = $_POST['email'];
$address = $_POST['address'];

$result = $conn->query("SELECT * from client where cmobile=$mobile;") or die($conn->error);
$isExist = $result->num_rows;
if ($isExist > 0) {
?>
    <script>
        alert("Number Already Registered\nPlease login");
        window.location = 'client_reg_html';
    </script>
<?php
    die;
} else if (strlen($mobile) <> 10 or substr($mobile, 0, 1) < 6) {
?>
    <script>
        alert('Please enter valid mobile number');
        window.location = 'client_reg_html.php';
    </script>
<?php
    die;
} else if ($pass1 == $pass2) {
    $conn->query("INSERT into acme_proj.client(cname, cmobile, pass, cmail, caddress) values('$name', '$mobile', '$pass1', '$email', '$address');") or die($conn->error);
?>
    <script>
        alert("Registered Successfully");
        window.location = 'client_login_html.php';
    </script>
<?php
} else {
?>
    <script>
        alert("Password Not Matched");
        window.location = 'client_reg_html.php';
    </script>
<?php
    die;
}

?>