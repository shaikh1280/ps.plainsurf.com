<!DOCTYPE html>
<html>
    <div class="login-box">
        <div class="login-logo">
            <a href="/user/forgetpassword"><b>Reset</b>Password</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Enter Your Registered Email ID</p>
            <?php
            echo form_open('/user/forgetpassword/check', ['class' => 'form', 'method' => 'POST']);
            ?>
            <div class="form-group has-feedback">
                <?php
                $data = array(
                    'type' => 'email',
                    'name' => 'u_email',
                    'placeholder' => 'Please Enter Email Address',
                    'class' => 'form-control'
                );
                echo form_input($data);
                ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="row">
                <!-- /.col -->
                <div class="box-footer">
                    <?php
                    $data = array(
                        'type' => 'submit',
                        'value' => 'Cancel',
                        'formaction' => '/user/session',
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
    </div>
    <!-- /.login-box-body -->
</div>
</html>
