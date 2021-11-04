<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Page</title>
</head>
<body>
<?php
$name = $email = $password = $gender = "";
$user = [];

if(isset($_POST["submit"])){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];
    $gender = $_POST["gender"];

    $data = array($name, $email, $gender);

    $user["user"] = $data;

    displayData($user);
}

function displayData($user){
    foreach ($user as $key => $values){
        ?>
        <div><?php echo $key?>: </div>
        <ul>
            <li><?php echo $values[0]?></li>
            <li><?php echo $values[1]?></li>
            <li><?php echo $values[2]?></li>
        </ul>
    <?php
    }
}
?>
</body>
</html>
