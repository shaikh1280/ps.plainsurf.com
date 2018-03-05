<!DOCTYPE html>
<html>
    <div class="login-box">
        <div class="login-logo">
            <a href="login"><b>Plain</b>Surf</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?php
            echo form_open('/user/session/logincheck', ['class' => 'form', 'method' => 'POST']);
            ?>
            <div class="form-group has-feedback">
                <?php
                $data = array(
                    'type' => 'email',
                    'name' => 'email',
                    'placeholder' => 'Please Enter Your Email ',
                    'class' => 'form-control'
                );
                echo form_input($data);
                ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?php
                $data = array(
                    'type' => 'password',
                    'name' => 'pass1',
                    'placeholder' => 'Please Enter Your New Password ',
                    'class' => 'form-control'
                );
                echo form_password($data);
                ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="checkbox icheck">
                    <div class="col-xs-7">
                        <?php
                        $data = array(
                            'onload' => 'disableSubmit()',
                            'name' => 'C1',
                            'id' => 'C1',
                            'value' => '1',
                            'checked' => TRUE,
                            'onchange' => 'activateButton(this)',
                            'style' => 'margin:1px'
                        );

                        echo form_checkbox($data);
                        ?>
                        <label>Remember Me</label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-5">
                    <?php
                    $data = array(
                        'type' => 'submit',
                        'id' => 'submit',
                        'value' => 'Sign In',
                        'class' => 'btn btn-primary btn-block btn-flat'
                    );
                    echo form_submit($data);
                    ?>
                </div>
                <!-- /.col -->
            </div>
            <?php echo form_close(); ?>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                    Google+</a>
            </div>
            <!-- /.social-auth-links -->

            <a href="/user/forgetpassword">I forgot my password</a><br>
            <a href="/user/register" class="text-center">Register a new membership</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</html>
