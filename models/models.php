<?php require_once 'external/login.inc.php'; ?>

<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Login</h4>
            </div>
            <div class="modal-body">
                <form action ="<?php echo $current_file;?>" method="post">
                    <p>Username: <input type='text' name='username'/></p>
                    <p>Password: <input type='password' name='password'/></p><br>

                    <p><button type="submit" class="btn btn-success">Log in</button></p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" data-dismiss="modal">Close</a>
            </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="logout" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Log out</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to log out?</p>
                <p><a href="external/logout.inc.php"><input type='button' class='btn btn-success' id ='logout_button' value='Log out'/></a></p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>
</div>