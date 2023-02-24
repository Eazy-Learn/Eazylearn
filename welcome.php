<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("location: login.php");
  }
require "header.php"; ?>

<body>
    <section class="container-fluid login-wrapper pt-3">
        <div class="container">

           <div class="row justify-content-center">
            <div class="col-lg-6">
                
            <div class="login-form">
            <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/easylearn/logo3.jpg" style="border-radius: 5px;" alt=""> 
                </a>
                                  
            <img src="./assets/img/easylearn/intro.jpg" class="pre-login-img img-responsive mt-5">
                <h2 class="pt-5">Hello, <span class="text-primary"><?php if(isset($_SESSION['lastname'])){
                            echo $_SESSION['lastname'];
                        } ?></span></h2>
                <form role="form" action="" class="mt-4">

                    <div class="input-group mb-4">
                        <h6 style="line-height: 1.4; opacity: .8;">
                        We welcome you to this platform where we make learning easy and stress free for students. Our aim is also to create Job Opportunities for students. <br /><br />To help us and others know you better you will have to answer the questions we ask next.
                        </h6>
                    </div>

                    <div class="form-group">
                        <a href="upload-image.php" class="form-control getStarted-btn text-center">Continue</a>
                    </div>

                </form>
               
            </div>
            </div>
           </div>
           
        </div>
    </section>
<?php require "footer.php"; ?>