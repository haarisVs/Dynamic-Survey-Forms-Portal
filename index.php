<?php require 'db.php';
if (isset($_SESSION['user'])){
if (!$_SESSION['user']) {
        // header("location:index.php");
  }else{
    header("location:newForms.php");
  }}
?>
<!DOCTYPE html>
<html>
<?php require 'headlinks.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>VERGE</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="adminprocess.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="username" name="adminusername" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="adminpassword" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>


 <script type="text/javascript">
  $(document).ready(function () {
      
      $('#username').focusout(function () {
          CheckUsername();          
      });

      $('#password').focusout(function () {
          CheckPassword();       
      });


      function CheckPassword() {        
        blankpass = $('#password').val();

        if (blankpass =='') {
          $('#password').css('border','1px solid red');
          $('#password').attr('placeholder','Please Enter Password');

        }else{
          $('#password').css('border','');
        }
      }

      function CheckUsername() {
        blankUsername = $('#username').val();

        if (blankUsername == '') {
          $('#username').css('border','1px solid red');
          $('#username').attr('placeholder','Please Enter Email');
          
          }else{
            $('#username').css('border','');
          }
      }
  })
</script>

<script type="text/javascript">
    $(document).ready(function () {
            
        // $('#username').focusout(function () {
        //     username = $('#username').val();
        //    $.ajax({
        //         type: "POST",
        //         url: "adminprocess.php",
        //         data: {
        //            username  : username,      
        //         },
                    
        //         success: function (success) {
        //               var res = $.parseJSON(success);

        //                    console.log(res.status);
        //                if (res.status == "wrong_user_name") {

        //             $('#username').css('border','1px solid red');
        //              $('#username').val('');
        //                 $('#username').attr('placeholder','Wrong User Name');
                        
        //                }else{
        //                   $('#username').css('border','');
        //                }
        //         }
        // });
        // })
})
</script>

<script type="text/javascript">
    $(document).ready(function () {
            
        // $('#password').focusout(function () {
        //     password = $('#password').val();
        //    $.ajax({
        //         type: "POST",
        //         url: "adminprocess.php",
        //         data: {
        //            password  : password,      
        //         },
                    
        //         success: function (result) {
        //               var res = $.parseJSON(result);

        //                    console.log(res.status);
        //                if (res.status == "wrong_user_pass") {

        //             $('#password').css('border','1px solid red');
        //              $('#password').val('');
        //                 $('#password').attr('placeholder','Wrong Password');
                        
        //                }else{
        //                   $('#password').css('border','');
        //                }
        //         }
        // });
        // })
})
</script>
</html>
