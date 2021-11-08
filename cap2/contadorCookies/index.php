
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>COOKIESCOUNTER</title>
</head>
<body>
<?php

if(isset($_GET["submit"])){
   echo destroyCookie();
    echo "Bienvenido!";
    setcookie("cookie", 1);
}
cookie();
function cookie(){
    if(isset($_COOKIE["cookie"])){
        setcookie("cookie", $_COOKIE["cookie"] = ++ $_COOKIE["cookie"]);
        print_r("Llevas ". $_COOKIE["cookie"]. " visitas!");
    }
}


function destroyCookie(): string
{
    unset($_COOKIE["cookie"]);
    setcookie("cookie", null, -1);

    return "PUTO DESTRUIDA!";
}

?>
<form>
    <input type="submit" name="submit" >DESTROY!</input>
</form>

</body>
</html>
