<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Better Bound House</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url('css/styles.css');?>" rel="stylesheet" />
        <style type="text/css">
            body {
                font-family: 'Varela Round', sans-serif;
            }
            .modal-login {      
                color: #636363;
                width: 350px;
            }
            .alert{display: none;}
            .modal-login .modal-content {
                padding: 20px;
                border-radius: 5px;
                border: none;
            }
            .modal-login .modal-header {
                border-bottom: none;   
                position: relative;
                justify-content: center;
            }
            .modal-login h4 {
                text-align: center;
                font-size: 26px;
                margin: 30px 0 -15px;
            }
            .modal-login .form-control:focus {
                border-color: #70c5c0;
            }
            .modal-login .form-control, .modal-login .btn {
                min-height: 40px;
                border-radius: 3px; 
            }
            .modal-login .close {
                position: absolute;
                top: -5px;
                right: -5px;
            }   
            .modal-login .modal-footer {
                background: #ecf0f1;
                border-color: #dee4e7;
                text-align: center;
                justify-content: center;
                margin: 0 -20px -20px;
                border-radius: 5px;
                font-size: 13px;
            }
            .modal-login .modal-footer a {
                color: #999;
            }       
            .modal-login .avatar {
                position: absolute;
                margin: 0 auto;
                left: 0;
                right: 0;
                top: -70px;
                width: 95px;
                height: 95px;
                border-radius: 50%;
                z-index: 9;
                background: #60c7c1;
                padding: 15px;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
            }
            .modal-login .avatar img {
                width: 100%;
            }
            .modal-login.modal-dialog {
                margin-top: 80px;
            }
            .modal-login .btn, .modal-login .btn:active {
                color: #fff;
                border-radius: 4px;
                background: #60c7c1 !important;
                text-decoration: none;
                transition: all 0.4s;
                line-height: normal;
                border: none;
            }
            .modal-login .btn:hover, .modal-login .btn:focus {
                background: #45aba6 !important;
                outline: none;
            }
            .trigger-btn {
                display: inline-block;
                margin: 100px auto;
            }

            .registerform{
                display: none ;
            }

            .modal-register {      
                color: #636363;
                width: 350px;
            }
            .modal-register .modal-content {
                padding: 20px;
                border-radius: 5px;
                border: none;
            }
            .modal-register .modal-header {
                border-bottom: none;   
                position: relative;
                justify-content: center;
            }
            .modal-register h4 {
                text-align: center;
                font-size: 26px;
                margin: 30px 0 -15px;
            }
            .modal-register .form-control:focus {
                border-color: #70c5c0;
            }
            .modal-register .form-control, .modal-register .btn {
                min-height: 40px;
                border-radius: 3px; 
            }
            .modal-register .close {
                position: absolute;
                top: -5px;
                right: -5px;
            }   
            .modal-register .modal-footer {
                background: #ecf0f1;
                border-color: #dee4e7;
                text-align: center;
                justify-content: center;
                margin: 0 -20px -20px;
                border-radius: 5px;
                font-size: 13px;
            }
            .modal-register .modal-footer a {
                color: #999;
            }       
            .modal-register .avatar {
                position: absolute;
                margin: 0 auto;
                left: 0;
                right: 0;
                top: -70px;
                width: 95px;
                height: 95px;
                border-radius: 50%;
                z-index: 9;
                background: #60c7c1;
                padding: 15px;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
            }
            .modal-register .avatar img {
                width: 100%;
            }
            .modal-register.modal-dialog {
                margin-top: 80px;
            }
            .modal-register .btn, .modal-register .btn:active {
                color: #fff;
                border-radius: 4px;
                background: #60c7c1 !important;
                text-decoration: none;
                transition: all 0.4s;
                line-height: normal;
                border: none;
            }
            .modal-register .btn:hover, .modal-login .btn:focus {
                background: #45aba6 !important;
                outline: none;
            }
            .trigger-btn {
                display: inline-block;
                margin: 100px auto;
            }
            </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container" style="height:115px;">
                <a class="navbar-brand js-scroll-trigger cb-logo" href="#page-top">
                    <img src="<?php echo base_url('images/Horizonslogo.png');?>" alt="Company Logo" style="width:200px;"/>
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#" data-toggle="modal" data-target="#loginForm">Login</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">Your Favorite Source of Free Bootstrap Themes</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">Start Bootstrap can help you build better websites using the Bootstrap framework! Just download a theme and start customizing, no strings attached!</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">We've got what you need!</h2>
                        <hr class="divider light my-4" />
                        <p class="text-white-50 mb-4">Start Bootstrap has everything you need to get your new website up and running in no time! Choose one of our open source, free to download, and easy to use themes! No strings attached!</p>
                        <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0">At Your Service</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Sturdy Themes</h3>
                            <p class="text-muted mb-0">Our themes are updated regularly to keep them bug free!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Up to Date</h3>
                            <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Ready to Publish</h3>
                            <p class="text-muted mb-0">You can use this design as is, or you can make changes!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Made with Love</h3>
                            <p class="text-muted mb-0">Is it really open source if it's not made with love?</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/1.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/1.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/2.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/2.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/3.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/3.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/4.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/4.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/5.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/5.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/6.jpg" alt="" />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to action-->
   <!--      <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">Free Download at Start Bootstrap!</h2>
                <a class="btn btn-light btn-xl" href="https://startbootstrap.com/theme/creative/">Download Now!</a>
            </div>
        </section> -->
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Let's Get In Touch!</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>09422326496</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block" href="mailto:ansellim@yahoo.com">ansellim@yahoo.com</a>
                    </div>
                </div>
            </div>

    <!-- Modal HTML -->
 

    <!-- Modal HTML -->
<div id="resetPasswordModal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="avatar">
                        <img src="images/login.png" style="border-radius: 50%;width: 95px; height: 95px; position: absolute;left: 0px; top: 0px; }"alt="Avatar">
                    </div>              
                    <h4 class="modal-title">Reset Password</h4>   
                </div>
                <div class="modal-body">
                  
                    <form id="resetPasswordForm" method="post">
                      <div class="alert alert-success"><p></p></div> 
                        <div class="form-group">
                            <input type="hidden" class="form-control" value="<?=$emailaddress;?>"  name="email_address" placeholder="Please Enter your Email Address" required="required">     
                        </div>      
                         <div class="form-group">
                              <input type="password" class="form-control" name="newpassword" placeholder="Enter New Password">
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control" name="confirmpassword" placeholder="Enter Confirm Password">
                            </div>     
                        <div class="form-group">
                            <button type="button" id="change_password" class="btn btn-primary btn-lg btn-block login-btn">Submit</button>
                        </div>
                          <p class="message"></p>

                    </form>
                    
                </div>  
            </div>
        </div>
</div> 
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Your Company</div></div>
        </footer>
        <!-- Bootstrap core JS-->
             <script>var base_url = "<?php echo base_url(); ?>";</script>
         <script src="<?php echo base_url('js/all.js');?>"></script>


        <script src="<?php echo base_url('js/jquery-3.5.1.slim.min.js');?>"></script>

        <script src="<?php echo base_url('js/bootstrap.bundle.min.js');?>"></script>

        <script src="<?php echo base_url('js/jquery.min.js');?>"></script>
         <script src="<?php echo base_url('js/bootstrap.min2.js');?>"></script>






        <!-- Third party plugin JS-->

        <script src="<?php echo base_url('js/jquery.easing.min.js');?>"></script>

         <script src="<?php echo base_url('js/jquery.magnific-popup.min.js');?>"></script>
        <script src="<?php echo base_url('bootstrap/vendors/moment/min/moment.min.js');?>"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url('js/scripts.js');?>"></script>
       <script src="<?php echo base_url('js/validateuser.js');?>"></script>
            <script type="text/javascript">
            $(window).on('load', function() {
                $('#resetPasswordModal').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                }); 
            });
       </script>
    </body>
</html>
