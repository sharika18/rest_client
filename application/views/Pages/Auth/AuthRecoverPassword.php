<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      include dirname(__DIR__)."/../Library/head_library.php";
      include dirname(__DIR__)."/../Library/generalValue.php"; 
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title>
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Arrisalah</b>WebApp</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

          <form action="<?php echo base_url()?>Login/updatePassword" method="post">
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" id="passwordPassword" name="passwordPassword">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Confirm Password" id="passwordConfirmPassword" name="passwordConfirmPassword">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <input type="hidden" class="form-control" id="txtID" name="txtID" value="<?=$userInfo[0]['userId']?>"/>
            <input type="hidden" class="form-control" id="txtID" name="CreatedBy" value="<?=$userInfo[0]['createdBy']?>"/>
            <input type="hidden" class="form-control" id="txtID" name="CreatedDate" value="<?=$userInfo[0]['createdDate']?>"/>
            
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Change password</button>
              </div>
              <!-- /.col -->
            </div>
			    </form>

          <p class="mt-3 mb-1">
            <a href="<?php echo base_url()?>welcome">Login</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
        <?php
            include dirname(__DIR__)."/../Script/ScriptAuthRecoverPassword.php"; 
            $this->load->view('Common/Alert');
        ?>
    </div>
  <!-- /.login-box -->

    <?php 
        include dirname(__DIR__)."/../Library/script_library.php";
        include dirname(__DIR__)."/../Library/script_custom.php";
    ?>

  </body>
</html>
