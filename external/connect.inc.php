<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=register;charset=utf8','root','');

}
catch(Exception $e){
    echo 'Error 1 has occured';
}
?>
<!--
 * Created by PhpStorm.
 * User: Niall
 * Date: 23/10/2015
 * Time: 13:54
 -->