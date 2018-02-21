<!DOCTYPE html>
<?php
$hash =$_GET['q'];
?> 
<html>
<div class="login-box">
  <div class="login-logo">
    <a href="/user/forgetpassword/resetpassword"><b>Reset</b>Password</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <form action="" method="post">
      <div class="form-group has-feedback">
          <input type="password" id="pass1" name="pass1" class="form-control" placeholder="Enter password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
        <div class="form-group has-feedback">
            <input type="password" id="pass2" name="pass2" class="form-control" placeholder="Re-enter Password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="box-footer">
            <button type="submit" formaction="/user/forgetpassword/update?q=<?php echo $hash?>" class="btn btn-info pull-right">Submit</button>
            <button type="submit" formaction="/user/forgetpassword" class="btn btn-default">Cancel</button>
                
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
</html>
