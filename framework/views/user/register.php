<!DOCTYPE html>
<html>
    <div class="register-box">
        <div class="register-logo">
            <a href="login"><b>Plain</b>Surf</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Register a new membership</p>

            <?php
            echo form_open('/user/register/registration', ['class' => 'form', 'method' => 'POST']);
            ?>
            <div class="form-group has-feedback">
                <?php
                $data = array(
                    'type' => 'text',
                    'name' => 'name',
                    'placeholder' => 'Please Enter Your Name ',
                    'class' => 'form-control'
                );
                echo form_input($data);
                ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
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
            <div class="form-group has-feedback">
                <?php
                $data = array(
                    'type' => 'password',
                    'name' => 'pass2',
                    'placeholder' => 'Please Enter Your New Password ',
                    'class' => 'form-control'
                );
                echo form_password($data);
                ?>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
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
                            'style'    => 'margin:1px'
                        );

                        echo form_checkbox($data);
                        ?>
                        <label>I agree to the <a href="#">terms</a></label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-5">
                    <?php
                    $data = array(
                        'type' => 'submit',
                        'id' => 'submit',
                        'value' => 'Sign Up',
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
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                    Google+</a>
            </div>

            <a href="login" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
        function disableSubmit() {
            document.getElementById("submit").disabled = true;
        }

        function activateButton(element) {

            if (element.checked) {
                document.getElementById("submit").disabled = false;
            } else {
                document.getElementById("submit").disabled = true;
            }

        }
    </script>
</html>
