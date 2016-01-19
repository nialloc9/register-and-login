<?php
    require_once 'external/header.php';
    require_once 'external/generateCopchaImage.inc.php';
    require_once 'external/register_backend.php';
?>
<!DOCTYPE html>
<html>
<header>
    <link type="text/css" rel="stylesheet" href="css/custom.css"/>
</header>
<body>
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-sm-1">
            <!--White space-->
        </div>

        <div class="col-sm-10">
            <form action='<?php echo $current_file; ?>' method='post'>
                <div class="form-group">
                    <label for="username_register">Username: </label>
                    <input type="text" class="form-control" id="username_register" name="username_register" maxlength="30">
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="password_register">Password: </label>
                        <input type="password" class="form-control" id="password_register" name="password_register" maxlength="60">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="password_register_again">Password again: </label>
                        <input type="password" class="form-control" id="password_register_again" name="password_register_again" maxlength="60">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="firstname">Firstname: </label>
                        <input type="text" class="form-control" id="firstname" name="firstname" maxlength="40">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="surname">Surname: </label>
                        <input type="text" class="form-control" id="surname" name="surname" maxlength="40">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="age">&nbsp; &nbsp; Age: &nbsp; (DD/MM/YY)</label><br>

                    <div class="form-group col-sm-4">
                        <select class="form-control" id="day" name="day">


                            <?php
                            $i = 1;
                            while ($i <= 32) {
                                echo '<option>' . $i . '</option>';
                                $i++;
                            }
                            ?>


                        </select>
                    </div>

                    <div class="form-group col-sm-4">
                        <select class="form-control" id="month" name="month">


                            <?php
                            $i = 1;
                            while ($i <= 12) {
                                echo '<option>' . $i . '</option>';
                                $i++;
                            }
                            ?>


                        </select>
                    </div>

                    <div class="form-group col-sm-4">
                        <select class="form-control" id="year" name="year">


                            <?php
                            $today = date('Y');
                            $i = 1900;
                            while ($i <= $today) {
                                echo '<option>' . $i . '</option>';
                                $i++;
                            }
                            ?>

                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <div class="radio">
                        <label class="radio-inline"><input type="radio" name="gender">Male</label>
                        <label class="radio-inline"><input type="radio" name="gender">Female</label>
                    </div>
                </div>

                <hr />

                <div class="row">

                    <div class="form-group col-sm-6">
                        <label for="email">Email: </label>
                        <input type="email" class="form-control" id="email" name="email" maxlength="100">
                    </div>
                </div>

                <hr />


                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="capctha">Please write the number below: </label><br>
                        <img src="external/generateCopchaImage.php" alt="security code" class="thumbnail thumb" width="50%"/>
                        <input type="text" size="6" name="copchaImage" class="form-control" id="capctha"/>
                    </div>
                </div>

                <label for="checkbox">I agree to the terms and conditions of use. </label>
                <input type ='checkbox' name="checkbox" value="agree" id="checkbox"/><br>

                <div class="form-group">
                    <input type="submit" id="register-submit" value="Register" class="btn btn-success"/>
                </div>

            </form>
        </div>

        <div class="col-sm-1">
            <!--White space-->
        </div>
    </div>
</div>

</body>
</html>
<!--We have made the form inside an if statement. So if your not logged in this
form will appear to complete. The reason for this is it is messy and not good to echo the HTML 
for a whole form. 

In this we need to check that the username is not already in the database. We need to check that 
password and password_again match.

When the user types in their information and forgets a field and submits it all the other fields 
the value dissappears and the user has to start again. This is annoying. So to keep there information 
we write some in-line PHP code in the HTML code and put it equal to the value of the fields. For security we 
don't do this for the password fields.

We check first to see has the user unputted data into all fields and then we check if the passwords match.
Then we start a query to select all the usernames in the database that have the same username as the one the
user has in putted. If the num of rows =1 we then know that the username is already being used.
-->