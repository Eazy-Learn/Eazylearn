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
    
                <h2 class="pt-2" style="font-size: 2rem; line-height: 1.3;">Upload Your Profile Image</h2>
                <img src="./assets/img/easylearn/intro2.jpg" class="pre-login-img img-responsive">
                <form id="upload-form" method="POST" enctype="multipart/form-data">
                    <div class="text-center" id="message">
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
<script>
    $(document).ready(function(){
        $('#upload-form').on('submit', function(e){
            e.preventDefault();
            var formData = new FormData(this);
            var fileSize = $('#file')[0].files[0].size;
            var maxSize = 5000000;
            if(fileSize > maxSize){
                $('#message').html('Image size is too large');
            } else{
                $.ajax({
                    url: 'backend/upload.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        $('#message').html(response);
                        location.href = "get_data.php";
                    }
                });
            }
        });
    });
</script>



