<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Menu Login</title>
        <link href="<?= base_url();?>assets/css/styles.css" rel="stylesheet" />
        <script src="<?= base_url(); ?>assets/vendor/fontawesome-free/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <style type="text/css">
  
  body {
    background: rgba(0, 0, 0, .3) url('<?php echo base_url();?>assets/bg.jpg');
     background-blend-mode: darken;
    background-repeat: no-repeat;
    background-size: cover;
    position: static;
  }
</style>
    <body class="">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Selamat Datang Ditoko Bangunan</h3></div>
                                    <div class="card-body">
                                        <form action="<?= site_url('auth/proses_user') ?>" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Username</label>
                                                <input class="form-control py-4" id="username" name="username" type="text" placeholder="Enter Username" />
                                            </div>
                                            <div class="form-group">
                                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="Password" type="password" name="password" placeholder="Enter password" />
                                            </div>
                                            <!-- <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div> -->
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                                <button type="submit" class="btn btn-primary" name="login" >Login</button>
                                                <a href="<?= site_url('auth/daftar_user')?>" class="">silahkan daftar member baru</a>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?= base_url();?>assets/vendor/jquery/jquery.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url();?>assets/js/scripts.js"></script>
    </body>
</html>
