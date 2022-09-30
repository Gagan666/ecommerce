  <?php
  session_start();
  $conn = new mysqli('localhost', 'root', '', "acme_proj");
  if (!$conn) {
    echo "<h1>connection error</h1>";
    die;
  }

  ?>    