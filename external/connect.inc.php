<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=register;charset=utf8','root','');

}
catch(Exception $e){
    echo 'Error 1 has occured';
}
?>
