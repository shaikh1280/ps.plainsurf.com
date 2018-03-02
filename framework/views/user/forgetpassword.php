<!DOCTYPE html>
<html>
<div class="login-box">
  <div class="login-logo">
      <a href="/user/forgetpassword"><b>Reset</b>Password</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Enter Your Registered Email ID</p>

    <form action="login" method="post">
      <div class="form-group has-feedback">
          <input type="email" id="email1" name="email1" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
 
      <div class="row">
        <!-- /.col -->
        <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" formaction="/user/forgetpassword/check" class="btn btn-info pull-right">Submit</button>
        </div>
        <!-- /.col -->
      </div>
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
</html>
