<?php 
session_start();
if(!isset($_SESSION['id'])){
  header("location: login.php");
}
require "database/connection.php";
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}
$sql = "SELECT * FROM users WHERE user_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $id);
if($stmt->execute()){
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
    }
}

require "backend/donate-pdf.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Favicons -->
    <link href="assets/img/easylearn/logo2.jpg" rel="icon">
    <link href="assets/img/easylearn/logo2.jpg" rel="apple-touch-icon">

    <title>Easy Learn</title>
    <link rel="stylesheet" href="./vendors/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/sweetalert.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/query.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

</head>

<body>
    <section class="container-fluid login-wrapper pt-3">
        <div class="container">

            <div class="row justify-content-center ">
                <div class="col-lg-6">
                    <div class="login-form">
                        <div class="logo text-danger"><a href="javascript:history.back();" style="font-size: 1.6rem;"><i class="bi bi-arrow-left" style="margin-right: .5rem;"></i> </a></div>
                            <h2 class="pt-3">Donate Pdf</h2>
                            <a href="edit-donate-pdf.php" class="text-primary">Edit Pdf</a>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group text-center">
                                <div class="message">
                                <?php 
                           if(isset($error['file'])){
                            echo $error['file'];
                           }
                        ?>
                                </div>
                            </div>
                                <div class="input-group mb-5">
                                    <input type="text" name="title" id="course_title" class="form-control" placeholder="Course Title" required>
                                </div>

                                <div class="form-group mb-5">
                                    <label for="desc">Description</label>
                                    <textarea class="form-control" name="desc" id="desc" required></textarea>
                                  </div>
            
                                <div class="mb-5" >  
                                    <label for="file">Upload Pdfs</label>
                                    <input class="form-control" type="file" id="file" name="file" placeholder="Upload Pdfs" required>
                                </div>
            
                                <div class="form-group mt-5">
                                    <button type="submit" name="donate-pdf-btn" id="donate-pdf-btn" class="form-control getStarted-btn">Upload</button>
                                </div>
            
                               <!--  <div class="progress">                   
                                    <div class="progress-bar" role="progressbar" style="width: 50%; height: 50px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% 
                                        <div class="spinner-border text-light float-end" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                          </div> 
                                    </div>
                                  </div> -->
                                
                            </form>
                            
                        </div>
                </div>
            </div>
            
            
        </div>
    </section>
    <script src="js/jquery2.js"></script>
    <script src="js/index.js"></script>
    <script src="./assets/js/sweetalert.js"></script>
</body>
    </html>
    