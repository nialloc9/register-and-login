<?php

if(!loggedin()){

    if (
        isset($_POST['username_register']) &&
        isset($_POST['password_register']) &&
        isset($_POST['password_register_again']) &&
        isset($_POST['firstname']) &&
        isset($_POST['surname']) &&
        isset($_POST['day']) &&
        isset($_POST['month']) &&
        isset($_POST['year']) &
        isset($_POST['gender']) &&
        isset($_POST['email']) &&
        isset($_POST['copchaImage'])


    )


    {
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];


        $username = $_POST['username_register'];

        $password = $_POST['password_register'];
        $password_again = $_POST['password_register_again'];
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $age = $day.'/'.$month.'/'.$year;
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $copchaImage = $_POST['copchaImage'];
        $checkbox = $_POST['checkbox'];

        if (
            !empty($username) &&
            !empty($password) &&
            !empty($password_again) &&
            !empty($firstname) &&
            !empty($email) &&
            !empty($age) &&
            !empty($copchaImage) &&
            !empty($surname)


        ) {
            if (strlen($username) > 30 || strlen($firstname) > 40 || strlen($surname) > 40 ||  strlen($email) > 100 || strlen($copchaImage) > 4) {
                echo 'Please adher to maxlength of fields.';
            } else {
                $max_length = '';
                if ($password != $password_again) {
                    echo 'Passwords dont match.';
                } else {
                    if($checkbox != 'agree'){
                        echo 'You must accept the terms and conditions of use.';
                    }else{



                        $stmt2 = $db->prepare("SELECT `username` FROM `users` WHERE `username`= :username");

                        $stmt2->bindValue(':username', $username);

                        $stmt2->execute();

                        $count = $stmt2->rowCount();

                        if ($count == 1) {
                            echo 'The username ' . $username . ' already exists.';
                        } else {


                            $stmt3 = $db->prepare("INSERT INTO `users` VALUES('',:username, :firstname, :surname, :gender, :age, :email, :password_hashed)");

                            $stmt3->bindParam(':username', $username);
                            $stmt3->bindParam(':firstname', $firstname);
                            $stmt3->bindParam(':surname', $surname);
                            $stmt3->bindParam(':gender', $gender);
                            $stmt3->bindParam(':age', $age);
                            $stmt3->bindParam(':email', $email);
                            $stmt3->bindParam(':password_hashed', $password_hashed);


                            if ($query_run = $stmt3->execute()) {

                                $stmt4 = $db->prepare("SELECT `id` AS `id` FROM `users` WHERE `username`=:username");

                                $stmt4->bindParam(':username', $username);

                                if (!$id_query_run = $stmt4->execute()) {

                                    echo("'Query failed " . $sql . " Error: " . mysqli_error($dbcnx));
                                    exit();
                                } else {
                                    $user_id = $stmt4->fetch(PDO::FETCH_ASSOC);
                                    $_SESSION['user_id'] = $user_id['id'];
                                }
                                header('Location: home.php');
                            } else {
                                echo 'Sorry, We could not register you at the current time, try again later.';
                            }
                        }
                    }
                }
            }
        }
        else {
            echo 'Please fill in all fields.';
        }

    };
    if (!isset($_POST['secure'])) {
        $_SESSION['secure'] = rand(1000, 9999);
    } else {
        if ($_SESSION['secure'] == $_POST['secure']) {
        } else {
            $_SESSION['secure'] = rand(1000, 9999);
        }
    }
}else{
    echo 'You are already logged in. Logout to register a new account.';
    die();
};
?>

<!-- Check if the user has inputted all the relevant data and then proceed to put it in the database. Do form verification to make sure passwords match, username dosn't exist, and lengths of inputs
are correct. -->
