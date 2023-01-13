

<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <meta name="description" content="" />

        <meta name="author" content="" />

        <meta name="robots" content="noindex" />

        <title>BBA</title>

        <!-- Favicon-->

        <link rel="icon" type="image/png" href="images/bba_LOGO.png" />

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
                background: #ffffff;

            }

            #forgotpasswordForm, #loginForm, #codeFormModal{

                background: url('../images/loginlogocrm2.png');

                /*background: linear-gradient(to right,
                rgba(250,250,250,.9),
                rgba(250,250,250,.9) ) ,
                url('../images/loginlogocrm2.png') no-repeat;*/
                background-repeat: no-repeat;

                background-position: center;

                background-size: 100%;
                

            }

            .modal-login {      

                color: #3b3b3b;

                width: 350px;

            }

            .alert{display: none;}

            .modal-login .modal-content {

                padding: 20px;

                border-radius: 5px;

                border: none;

                margin-top: 180px;

                /*background: #D3D3D3;*/

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

                left: 103px;

                right: 0;

                top: -110px;

                /*width: 95px;

                height: 95px;*/

               /* border-radius: 50%;*/

                z-index: 9;

               /* background: #60c7c1;*/

                padding: 15px;

                /*box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);*/

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

                background: #0e1b40 !important;

                text-decoration: none;

                transition: all 0.4s;

                line-height: normal;

                border: none;

            }

            .modal-login .btn:hover, .modal-login .btn:focus {

                background: #2d57cc !important;

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

                /*width: 95px;

                height: 95px;*/

                /*border-radius: 50%;*/

                z-index: 9;

                /*background: #60c7c1;*/

                padding: 15px;

               /* box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);*/

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

                background: #2d57cc !important;

                outline: none;

            }

            .trigger-btn {

                display: inline-block;

                margin: 100px auto;

            }

            /* preloader */
            #loader {
                border: 12px solid #f3f3f3;
                border-radius: 50%;
                border-top: 12px solid #444444;
                width: 70px;
                height: 70px;
                animation: spin 1s linear infinite;
                }
                
                @keyframes spin {
                100% {
                    transform: rotate(360deg);
                }
                }
                
                .center {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                }
            /* end of preloader */
            @media only screen and (max-width: 375px) {
              .modal-login .modal-content {
                    margin-left: 5px;
                }
            }

            </style>

    </head>

    <body id="page-top">

        <!-- Navigation-->

        <!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">

            <div class="container" style="height:115px;">

                <a class="navbar-brand js-scroll-trigger cb-logo" href="#page-top">

                    <img src="<?php echo base_url('images/HORIZONS-LOGO-2.png');?>" alt="Company Logo" style="width:150px;"/>

                </a>

                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                <div class="collapse navbar-collapse" id="navbarResponsive">

                    <ul class="navbar-nav ml-auto my-2 my-lg-0">

                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>

                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>

                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                        
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#" data-toggle="modal" data-target="#loginForm">Login</a></li>

                    </ul>

                </div>

            </div>

        </nav>

        <!-- Masthead-->

        <!-- <header class="masthead">
            
            <!--<section class="page-section bg-warning">-->

            <!-- <div class="container h-100">

                <div class="row h-100 align-items-center justify-content-center text-center">

                    <div class="col-lg-10 align-self-end">

                        <h1 class="text-uppercase font-weight-bold" style="color:#ffb606">Professional. Passionate. Experienced.</h1>

                        <hr class="divider my-4"/>

                    </div>

                    <div class="col-lg-8 align-self-baseline">

                        <p class="font-weight-light mb-5" style="color:#ffb606">Helping authors protect their brand and improve their book performance in the market. We help authors get an exclusive contract from Traditional Publishing Houses.</p>

                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about" style="background:#70c5c0">Find Out More</a>

                    </div>

                </div>

            </div> -->
             
          <!--</section>-->

       <!--  </header> -->

        <!-- About-->
<!-- 
        <section class="page-section" style="background:#70c5c0" id="about">

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-8 text-center">

                        <h2 class="mt-0" style="color:#212529">We've got what you need!</h2>

                        <hr class="divider light my-4" />

                        <p class="mb-4" style="color:#212529">We bring the best of both worlds to the table—the personal client attention of a small agency and the business acumen and clout of a larger one. We invest a great deal of care in each project and in each client. We devise a strategy at every stage of the writing process, from conception, to editorial, to submission, that is tailored to the client and that will enable us to find the best publisher or publishing platform for his or her books. We are seeking long-term relationships with writers and illustrators whose careers we can develop and whose talent we can foster.</p>

                        <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>

                    </div>

                </div>

            </div>

        </section> 
 -->
        <!-- Services-->

        <!-- <section class="page-section" id="services">

            <div class="container">

                <h2 class="text-center mt-0">At Your Service</h2>

                <hr class="divider my-4" />

                <div class="row">

                    <div class="col-lg-3 col-md-6 text-center">

                        <div class="mt-5">

                            <i class="fas fa-4x fa-book mb-4" style="color:#70c5c0"></i>

                            <h3 class="h4 mb-2">Publishing</h3>

                            <p class="text-muted mb-0">Offers an array of publishing packages created to make your literary journey easier. After you write and edit your book, we complete the design of the interior and cover, get your book listed by big distributors and online stores, then print-on-demand as orders come in, and pay royalties on each sale. And you retain all the rights to your work at every stage.</p>

                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 text-center">

                        <div class="mt-5">

                            <i class="fas fa-4x fa-bullhorn mb-4" style="color:#70c5c0"></i>

                            <h3 class="h4 mb-2">Marketing</h3>

                            <p class="text-muted mb-0">You need to know what kind of promotion works best for your genre to maximize sales potential. Our Horizons Marketing Consultants can advise you on which of our huge range of marketing services best fits your genre, personal goals, and marketing needs.</p>

                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 text-center">

                        <div class="mt-5">

                            <i class="fas fa-4x fa-handshake mb-4" style="color:#70c5c0"></i>

                            <h3 class="h4 mb-2">Consultation & Management</h3>

                            <p class="text-muted mb-0">Helping authors improve their performance on book sales. Authors may draw upon the services of management consultants for a number of reasons, including gaining external (and presumably objective) advice and access to consultants’ specialized expertise.</p>

                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 text-center">

                        <div class="mt-5">

                            <i class="fas fa-4x fa-heart mb-4" style="color:#f80036"></i>

                            <h3 class="h4 mb-2">Lifetime Royalty Program</h3>

                            <p class="text-muted mb-0">We want to make sure that you’re getting 100% Lifetime Royalty Program and full control over your book.</p>

                        </div>

                    </div>

                </div>

            </div>

        </section> -->

        <!-- Portfolio-->

        <!--<div id="portfolio">-->

        <!--    <div class="container-fluid p-0">-->

        <!--        <div class="row no-gutters">-->

        <!--            <div class="col-lg-4 col-sm-6">-->

        <!--                <a class="portfolio-box" href="assets/img/portfolio/fullsize/1.jpg">-->

        <!--                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/1.jpg" alt="" />-->

        <!--                    <div class="portfolio-box-caption">-->

        <!--                        <div class="project-category text-white-50">Category</div>-->

        <!--                        <div class="project-name">Project Name</div>-->

        <!--                    </div>-->

        <!--                </a>-->

        <!--            </div>-->

        <!--            <div class="col-lg-4 col-sm-6">-->

        <!--                <a class="portfolio-box" href="assets/img/portfolio/fullsize/2.jpg">-->

        <!--                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/2.jpg" alt="" />-->

        <!--                    <div class="portfolio-box-caption">-->

        <!--                        <div class="project-category text-white-50">Category</div>-->

        <!--                        <div class="project-name">Project Name</div>-->

        <!--                    </div>-->

        <!--                </a>-->

        <!--            </div>-->

        <!--            <div class="col-lg-4 col-sm-6">-->

        <!--                <a class="portfolio-box" href="assets/img/portfolio/fullsize/3.jpg">-->

        <!--                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/3.jpg" alt="" />-->

        <!--                    <div class="portfolio-box-caption">-->

        <!--                        <div class="project-category text-white-50">Category</div>-->

        <!--                        <div class="project-name">Project Name</div>-->

        <!--                    </div>-->

        <!--                </a>-->

        <!--            </div>-->

        <!--            <div class="col-lg-4 col-sm-6">-->

        <!--                <a class="portfolio-box" href="assets/img/portfolio/fullsize/4.jpg">-->

        <!--                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/4.jpg" alt="" />-->

        <!--                    <div class="portfolio-box-caption">-->

        <!--                        <div class="project-category text-white-50">Category</div>-->

        <!--                        <div class="project-name">Project Name</div>-->

        <!--                    </div>-->

        <!--                </a>-->

        <!--            </div>-->

        <!--            <div class="col-lg-4 col-sm-6">-->

        <!--                <a class="portfolio-box" href="assets/img/portfolio/fullsize/5.jpg">-->

        <!--                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/5.jpg" alt="" />-->

        <!--                    <div class="portfolio-box-caption">-->

        <!--                        <div class="project-category text-white-50">Category</div>-->

        <!--                        <div class="project-name">Project Name</div>-->

        <!--                    </div>-->

        <!--                </a>-->

        <!--            </div>-->

        <!--            <div class="col-lg-4 col-sm-6">-->

        <!--                <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg">-->

        <!--                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/6.jpg" alt="" />-->

        <!--                    <div class="portfolio-box-caption p-3">-->

        <!--                        <div class="project-category text-white-50">Category</div>-->

        <!--                        <div class="project-name">Project Name</div>-->

        <!--                    </div>-->

        <!--                </a>-->

        <!--            </div>-->

        <!--        </div>-->

        <!--    </div>-->

        <!--</div>-->

        <!-- Call to action-->

   <!--      <section class="page-section bg-dark text-white">

            <div class="container text-center">

                <h2 class="mb-4">Free Download at Start Bootstrap!</h2>

                <a class="btn btn-light btn-xl" href="https://startbootstrap.com/theme/creative/">Download Now!</a>

            </div>

        </section> -->

        <!-- Contact-->

        <!-- <section class="page-section bg-light" id="contact">

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-8 text-center">

                        <h2 class="mt-0">Let's Get In Touch!</h2>

                        <hr class="divider my-4"/>

                        <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">

                        <i class="fas fa-phone fa-3x mb-3 text-muted" style="color:#70c5c0"></i>

                        <a class="d-block" href="tel:+1 (800)-691-5131">+1 (800)-691-5131</a>

                    </div>

                    <div class="col-lg-4 mr-auto text-center">

                        <i class="fas fa-envelope fa-3x mb-3 text-muted" style="color:#70c5c0"></i>

                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->

                        <!-- <a class="d-block" href="mailto:admin@horizonsliterary.us">admin@horizonsliterary.us</a>

                    </div>

                </div>

            </div>
  -->


    <!-- Modal HTML -->


<div id="loginForm" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">

        <div class="modal-dialog modal-login">

            <div class="modal-content">

                <div class="modal-header">

                    <div class="avatar">

                        <img src="images/bba_LOGO.png" style="position: absolute;left: -55px; top: -70px; }"alt="Avatar">

                    </div>              

                   <!--  <h4 class="modal-title">HLMcrm</h4>    -->

                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

                </div>

                <div class="modal-body" >

                    <form class="formlogin"  method="post">

                       <div class="alert alert-success"><p></p></div> 

                        <div class="form-group">

                       <input type="text" class="form-control" name="email_address" placeholder="Email Address" required="required">     

                        </div>

                        <div class="form-group">

                            <input type="password" class="form-control" name="password" placeholder="Password" required="required"> 

                        </div>  
                          <div class="form-group">

                             <select class="form-control usertype" name="usertype">
                                  <option value="">Please Select A User Role</option>
                                  <option value="Admin">Admin</option>
                                  <option value="IT">IT</option>
                                  <option value="Manager">Manager</option>
                                  <option value="Agent">Agent</option>
                                  <option value="Finance">Finance</option>
                                  <option value="Production">Production</option>
                                  <option value="Author Relation">Author Relations</option>
                                  <option value="Human Resources">Human Resources</option>
                                  <option value="Interior Designer">Interior Designer</option>
                                  <option value="Cover Designer">Cover Designer</option>
                                  <option value="Publishing/Marketing">Publishing/Marketing</option>
                              </select>
                        </div>  

                        <!-- preloader -->
                        <div id="loader" class="center"></div>

                        <div class="form-group">

                            <button type="button" id="login" class="btn btn-primary btn-lg btn-block login-btn">Login</button>

                        </div>

                        <!--<p class="message">Not registered? <a href="#">Create an account</a></p>-->

                    </form>

                    <form class="registerform" method="post">

                        <div class="alert alert-success"><p></p></div>

                        <div class="form-group">

                            <input type="text" class="form-control" name="firstname" placeholder="First Name" required="required">     

                        </div>

                        <div class="form-group">

                            <input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required">     

                        </div>

                        <div class="form-group">

                            <input type="text" class="form-control" name="username" placeholder="Username" required="username">     

                        </div>

                        <div class="form-group">

                            <input type="email" class="form-control" name="email_address" placeholder="Email Address" required="required">     

                        </div>

                        <div class="form-group">

                            <input type="password" class="form-control" name="password" placeholder="Password" required="required"> 

                        </div>  

                         <div class="form-group">

                            <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="required"> 

                        </div>              

                        <div class="form-group">

                            <button type="button" id="register" class="btn btn-primary btn-lg btn-block login-btn" >Register</button>

                        </div>

                            <p class="message">Already registered? <a href="#" >Sign In</a></p>

                    </form>

                    

                </div>  

                <div class="modal-footer">

                    <a href="#" id="forgot_password" data-toggle="modal" data-target="#forgotpasswordForm">Forgot Password?</a>

                </div>

            </div>

        </div>

</div>     



    <!-- Modal HTML -->

<div id="forgotpasswordForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">

        <div class="modal-dialog modal-login">

            <div class="modal-content">

                <div class="modal-header">

                    <div class="avatar">

                        <img src="images/HORIZONS-LOGO-2.png" style="left: -41px; top: -70px; }"alt="Avatar">

                    </div>              

                    <h4 class="modal-title">Forgot Password?</h4>   

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>

                <div class="modal-body">

                  

                    <form class="forgotpasswordForm" method="post">

                        <div class="alert alert-success"><p></p></div> 

                        <div class="form-group">

                            <input type="text" class="form-control" name="email_address" placeholder="Please Enter your Email Address" required="required">     

                        </div>           

                        <div class="form-group">

                            <button type="button" id="forgot_password" class="btn btn-primary btn-lg btn-block login-btn">Submit</button>

                        </div>

                            <p class="message">Have you remembered it? <a href="#" id="sign_in" data-toggle="modal" data-target="#loginForm">Try logging in again.</a></p>

                    </form>

                    

                </div>  

            </div>

        </div>

</div> 




<div id="codeFormModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">

        <div class="modal-dialog modal-login">

            <div class="modal-content">

                <div class="modal-header">

                    <div class="avatar">

                        <img src="images/HORIZONS-LOGO-2.png" style="left: -41px; top: -70px; }"alt="Avatar">

                    </div>              

                    <h4 class="modal-title">Code</h4>   


                </div>

                <div class="modal-body">

                  

                    <form class="codeForm" method="post">

                        <div class="alert alert-success"><p></p></div> 

                        <div class="form-group">

                            <input type="text" class="form-control" name="idle_code" placeholder="Please Enter your Code" required="required">     
                            <input type="hidden" class="form-control" name="user_id" required="required">     

                        </div>           

                        <div class="form-group">

                            <button type="button" id="add_code" class="btn btn-primary btn-lg btn-block login-btn">Submit</button>

                        </div>


                    </form>

                    

                </div>  

            </div>

        </div>

</div> 

       <!--  </section> -->

        <!-- Footer-->

       <!--  <footer class="bg-dark py-5">

            <div class="container"><div class="small text-center text-white text-muted">Copyright © 2021 - Better Bound House LLC</div></div>

        </footer> -->

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
           $('#loginForm').modal('show');
     });

    </script>

     <!-- preloader -->
    <script>
        $(window).on('load', function() {
            $("#loader").css("display", "none");  
     });

    </script>


    </body>

</html>

