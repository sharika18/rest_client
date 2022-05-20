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
                <a href="#"><b>Arrisalah </b>WebApp</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

                <form action="<?php echo base_url()?>Login/checkEmail" method="post">
                    <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name ="emailEmail">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                    </div>
                    <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="<?php echo base_url()?>welcome">Login</a>
                </p>
                <!--
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>-->
                </div>
                <!-- /.login-card-body -->
            </div>
            <?php 
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
