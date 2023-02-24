<?php 
session_start();
if(!isset($_SESSION['id'])){
  header("location: login.php");
}
require "backend/edit-room-mate-photo.php";
require "header.php"; ?>

<body>
    <section class="container-fluid login-wrapper pt-3">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6">
                <div class="login-form">
               <div class="d-flex">
               <a href="javascript:history.back();"><i style="font-size: 2rem;" class="bi bi-arrow-left"></i></a>

                <h2 class="pt-2 ms-3" style="font-size: 1.5rem; line-height: 1.3;">Update Image</h2>
               </div>
                <img src="./assets/img/easylearn/intro2.jpg" class="pre-login-img img-responsive mt-5">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="text-center">
                        <?php
                        if(isset($error['file'])){
                            echo $error['file'];
                        }
                        ?>
                    </div>

                    <div class="mb-4">
                    <input type="file" name="file" id="file" class="form-control mt-2"  style="border: 1px solid rgba(0,0,0,.6); border-radius: 5px;">
                    </div>

                    <div class="form-group">
                        <button type="submit" name="image-btn" class="form-control getStarted-btn">Continue</button>
                    </div>
                    
                   
                </form>
               
            </div>
                </div>
            </div>
           
        </div>
    </section>
<?php require "footer.php"; ?>

