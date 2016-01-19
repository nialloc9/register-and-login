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
                    <input type="text" class="form-control" id="username_register" name="username_register" maxlength="30" value="<?php if(isset($username)){echo $username;} ?>">
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
                        <input type="text" class="form-control" id="firstname" name="firstname" maxlength="40" value="<?php if(isset($firstname)){echo $firstname;} ?>">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="surname">Surname: </label>
                        <input type="text" class="form-control" id="surname" name="surname" maxlength="40" value="<?php if(isset($surname)){echo $surname;} ?>">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="age">&nbsp; &nbsp; Age: &nbsp; (DD/MM/YY)</label><br>

                    <div class="form-group col-sm-4">
                        <select class="form-control" id="day" name="day">
                        <!-- while loop to put in numbers 1 to 31 for the days in a month. -->

                            <?php
                            $i = 1;
                            while ($i <= 31) {
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
                        <label class="radio-inline"><input type="radio" name="gender" value="male">Male</label>
                        <label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
                    </div>
                </div>

                <hr />

                <div class="row">

                    <div class="form-group col-sm-6">
                        <label for="email">Email: </label>
                        <input type="email" class="form-control" id="email" name="email" maxlength="100" value="<?php if(isset($email)){echo $email;} ?>">
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
<!--We put if statements to check if the user has already inputted some data like their name and if they have we echo it out so the user dosn't have to inputted it again.-->