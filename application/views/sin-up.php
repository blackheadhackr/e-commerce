<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?= base_url("application/ADMIN-DOWNLOAD/assets/images/ovista1.png")?>">
    <title>Ovista: Login</title>
    <!-- Custom CSS -->
    <?php  $this->load->view('common/cocdx'); ?>

</head>

<body>

    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->

        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(<?= base_url("externalfile/img/h.jpg")?>) no-repeat center center;">

            <div class="auth-box row">
                <div class="col-md-12"><?=$this->session->flashdata('dharmender');?></div>
                <div class="col-lg-7 col-md-5 modal-bg-img"
                    style="background-image: url(<?= base_url("externalfile/img/22.png")?>);">


                </div>

                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="<?= base_url("ecomadmin/application/ADMIN-DOWNLOAD/assets/images/big/icon.png")?>"
                                style="height:50px" alt="Ovista">
                        </div>
                        <h2 class="mt-3 text-center">Ovista : Sign Up</h2>


                        <form class="mt-4" action="<?=base_url('login/user')?>" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="uname">Name</label>
                                        <input class="form-control" id="uname" type="text"
                                            placeholder="enter your name" name="Name">
                                    </div>
                                    <div class="text-danger"><?php echo form_error('Name'); ?> </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="uname">Email</label>
                                        <input class="form-control" id="uname" type="email"
                                            placeholder="enter your email" name="email">
                                    </div>
                                    <div class="text-danger"><?php echo form_error('email'); ?> </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="uname">Username</label>
                                        <input class="form-control" id="uname" type="text"
                                            placeholder="enter your username" name="username">
                                    </div>
                                    <div class="text-danger"><?php echo form_error('username'); ?> </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="pwd">Password</label>
                                        <input class="form-control" id="pwd" type="password"
                                            placeholder="enter your password" name="password">
                                        <div class="text-danger"><?php echo form_error('password'); ?> </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                </div>
                                <button type="submit" class="btn w-100 btn-dark">Sign up</button>
                                <div class="col-lg-12 text-center mt-5">
                                    Already have an account <a href="<?=base_url('login')?>" class="text-primary">Sign in</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <!--<script src="../assets/libs/jquery/dist/jquery.min.js "></script>-->
   
    <!--<script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>-->
    <!--<script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>-->
   
    <script src="<?= base_url("ecomadmin/application/ADMIN-DOWNLOAD/assets/libs/jquery/dist/jquery.min.js")?>">
    </script>
    <script
        src="<?= base_url("ecomadmin/application/ADMIN-DOWNLOAD/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js")?>">
    </script>
    <!-- apps -->
    <!-- apps -->
    <script src="<?= base_url("ecomadmin/application/ADMIN-DOWNLOAD/dist/js/app-style-switcher.js")?>"></script>
    <script src="<?= base_url("ecomadmin/application/ADMIN-DOWNLOAD/dist/js/feather.min.js")?>"></script>
    <script
        src="<?= base_url("ecomadmin/application/ADMIN-DOWNLOAD/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js")?>">
    </script>
    <script src="<?= base_url("ecomadmin/application/ADMIN-DOWNLOAD/dist/js/sidebarmenu.js")?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url("ecomadmin/application/ADMIN-DOWNLOAD/dist/js/custom.min.js")?>"></script>
    <!--This page JavaScript -->
    <script src="<?= base_url("ecomadmin/application/ADMIN-DOWNLOAD/assets/extra-libs/c3/d3.min.js")?>"></script>
    <script src="<?= base_url("ecomadmin/application/ADMIN-DOWNLOAD/assets/extra-libs/c3/c3.min.js")?>"></script>
    <script src="<?= base_url("ecomadmin/application/ADMIN-DOWNLOAD/assets/libs/chartist/dist/chartist.min.js")?>">
    </script>
    <script
        src="<?= base_url("ecomadmin/application/ADMIN-DOWNLOAD/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js")?>">
    </script>
    <script
        src="<?= base_url("ecomadmin/application/ADMIN-DOWNLOAD/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js")?>">
    </script>
    <script
        src="<?= base_url("ecomadmin/application/ADMIN-DOWNLOAD/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js")?>">
    </script>
    <script src="<?= base_url("ecomadmin/application/ADMIN-DOWNLOAD/dist/js/pages/dashboards/dashboard1.min.js")?>">
    </script>
    <script>
    $(".preloader ").fadeOut();
    </script>
</body>

</html>