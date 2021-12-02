<?php

include ('db/DatabaseClass.php');
include ('classes/UserClass.php');



if(isset($_POST["submit"])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    if(isset($_COOKIE['LOGIN'])){
        header('Location: logged.php?username='.$username);
    } else {
        session_start();
        $_SESSION['LOGIN'] = $username;
        setcookie('LOGIN',$username, time()+300);
    }


    $db = new DatabaseClass();
    $user = new UserClass($username, $password, $db->getConection());

    echo $user->show();
}
