<?php

if(!isset($_POST['secure'])){
    $_SESSION['secure'] = rand(1000,9999);
}else{
    if($_SESSION['secure'] == $_POST['secure']){

    }else{
        $_SESSION['secure'] = rand(1000,9999);
    }
}


?>

<!--
    We start a session here that stores a random value between 1000 and 9999 with the name secure.
-->