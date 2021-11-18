<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FORM DATA</title>
</head>
<body>
<?php

include ('User.php');

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $password = $_POST['password'];

    $user = new User($name, $password);

    echo $user->toDatabase();
}
?>
</body>
</html>
