<?php
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $stmt = $db->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->bindParam(1, $username);

        $stmt->execute();

        $hash = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $hash)){
            $password_verified = 1;
        }else{
            $password_verified = 0;
        }

        if ($password_verified = 1) {
            $stmt_id = $db->prepare("SELECT id FROM users WHERE username = ?");
            $stmt_id->bindParam(1, $username);

            $stmt_id->execute();

            $user_id = $stmt_id->fetch(PDO::FETCH_ASSOC);

            $id_num_rows = $stmt_id->rowCount();
            if ($id_num_rows == 0) {
                $statement = 'You have entered a wrong password';
            }else if($id_num_rows == 1){

                $_SESSION['user_id'] = $user_id['id'];
                print_r($_SESSION);
                header("Location: home.php");
                exit();
            }
        } else {
            $statement = "Please enter a username and password.";
        }
    }
}
?>

<!-- Connect to the database and get the users id from the database where the id matches the password and username provided. Then create a session and put the user id in it. After redirect. -->
