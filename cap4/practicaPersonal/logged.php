<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGGED</title>
</head>
<body>
<?php
session_start();

 $username = $_GET['username'];

 echo 'Bienvenido, '. $_COOKIE['LOGIN'];

 if(isset($_GET['logout'])){
     header('Location: logout.php?username='.$username);
 }

?>

<button onclick="location.href='logged.php?logout'">LogOut!</button>

</body>
</html>
