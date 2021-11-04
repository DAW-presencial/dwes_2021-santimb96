<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>phpSelf</title>
</head>
<body>

<form  method="get" action= <?php echo $_SERVER["PHP_SELF"]?>>
</form>
<?php  echo $_SERVER["PHP_SELF"]?>
</body>
</html>
