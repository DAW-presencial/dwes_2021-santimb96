<?php
session_start();
$username = $_GET['username'];

setcookie('LOGIN', $username, time()-3600);
unset($_COOKIE['LOGIN']);
session_unset();
session_destroy();
header('Location: login.php');