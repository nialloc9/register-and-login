<?php
session_start();
require 'connect.inc.php';

ob_start();
$current_file = $_SERVER['SCRIPT_NAME'];
@$http_referer = $_SERVER['HTTP_REFERER'];

function loggedin(){
    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        return true;
    }else{
        return false;
    }
}

?>

<!--This file is created so we don't have to do this each time. We can just require this file in the document. Session_start() has to be at the top of this document and require this
    in every file at the top of the page before any other php code.
    This code gets the name of the file being used. This can be added to any page. It also will start a session
    so we don't have to do it for each login. We use the ob_start() function here because it will not send other
    data except for our header.

    ob_start():
    Think of ob_start() as saying "Start remembering everything that would normally be outputted, but don't quite do anything with it yet."

    For example:

    ob_start();
    echo("Hello there!"); //would normally get printed to the screen/output to browser
    $output = ob_get_contents();
    ob_end_clean();
    There are two other functions you typically pair it with: ob_get_contents(), which basically gives you whatever has been "saved" to the buffer since it was turned on with ob_start(), and then ob_end_clean() or ob_flush(), which either stops saving things and discards whatever was saved, or stops saving and outputs it all at once, respectively.

    The loggedin() function says:
    If a session has been made called user_id and is not empty then the user is already logged in.

    The HTTP_REFERER query tells us the page the user has come from.

-->
