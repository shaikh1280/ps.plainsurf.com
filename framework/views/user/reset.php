<!DOCTYPE html>
<?php
$hash = $_GET['q'];
?> 
<html>
    <div class="login-box">
        <div class="login-logo">
            <a href="/resetpassword"><b>Reset</b>Password</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Reset Password</p>
            <?php
            echo form_open('/resetpassword?q=' . $hash, ['class' => 'form', 'method' => 'POST']);
            ?>
            <div class="form-group has-feedback">
                <?php
                $data = array(
                    'type' => 'password',
                    'name' => 'pass1',
                    'placeholder' => 'Please Enter New Password  ',
                    'class' => 'form-control'
                );
                echo form_password($data);
                ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?php
                $data = array(
                    'type' => 'password',
                    'name' => 'pass2',
                    'placeholder' => 'Please Re-enter Password ',
                    'class' => 'form-control'
                );
                echo form_password($data);
                ?>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="box-footer">
                    <?php
                    $data = array(
                        'type' => 'submit',
                        'value' => 'Cancel',
                        'formaction' => '/login',
                        'class' => 'btn btn-danger'
                    );
                    echo form_submit($data);
                    ?>
                    <?php
                    $data = array(
                        'type' => 'submit',
                        'value' => 'Submit',
                        'class' => 'btn btn-info pull-right'
                    );
                    echo form_submit($data);
                    ?>
                </div>
                <!-- /.col -->
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.login-box-body -->
    </div>
</html>
