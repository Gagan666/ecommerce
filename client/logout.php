<?php
include ('/shared/connection.php');
session_unset();
session_destroy();
header('location:client_login_html.php');
