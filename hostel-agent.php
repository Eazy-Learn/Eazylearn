
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

require "./backend/house-agent.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Form page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/easylearn/logo2.jpg" rel="icon">
  <link href="assets/img/easylearn/logo2.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="vendors/bootstrap-5.2.2-dist/css/bootstrap.css">
  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="css/form.css">
  <script src="tinymce/js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
    tinymce.init({
      selector: '#mytextarea',
      plugins: [
        'advlist autolink list link image charmap print preview anchor', 'searchreplace visualblock code fullscreen', 'insertdatetime media table paste',
      ],
      toolbar: 'undo redo | stylesheet | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
    })
  </script>


</head>

<body>

  <section class="container mt-0 pt-4 mx-auto">
  <a href="javascript:history.back();" style="font-size: 1.2rem;"><i class="bi bi-arrow-left text-black" style="margin-right: .5rem;"></i> Hostel Finder</a>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form mt-5" enctype="multipart/form-data">
      <!-- select type -->
      <div class="text-center">
      <?php 
                           if(isset($error['file'])){
                            echo $error['file'];
                           }
                        ?>
      </div>
      <div class="d-flex align-items-center text-center text-black">
     
        <i class="bi bi-tags-fill tag"></i>
        <h3 class="ps-4 mb-0">Select Type</h3>
      </div>
      <p class="my-3"></p>
      <div class="my-4">
        <div>
          <label for="select" class="fw-bold">Accomodation Type</label>
          <i class="bi bi-asterisk asterisk "></i>
        </div>
        <select class="form-select" name="house_type" is="house_type" aria-label="Default select example">
          <option value="" selected>Select Type</option>
          <option value="sale">For Sale</option>
          <option value="rent">For Rent</option>
          <option value="lease">For Lease</option>
        </select>
      </div>
      <!-- end pf select type -->
      <!-- select category -->
      <div class="d-flex align-items-center text-center">
        <i class="bi bi-tags-fill tag"></i>
        <h3 class="ps-4 mb-0">Select Category</h3>
      </div>
      <p class="my-3"></p>
      <!-- end of select category -->
      <div class="my-4">
        <div>
          <label for="category" class="fw-bold">Category</label>
          <i class="bi bi-asterisk asterisk "></i>
        </div>
        <select class="form-select" name="house_category" aria-label="Default select example">
          <option value="" selected>Select a category</option>
          <option value="flat">Flat</option>
          <option value="self contain">Self Contain</option>
          <option value="a room">A Room</option>
          <option value="commercial property">Commercial Property</option>
          <option value="guest house">Guest House</option>
          <option value="plots and land">Plots & Land</option>
        </select>
      </div>
      <!-- Product Infomation -->
      <div class="d-flex align-items-center text-center">
        <i class="bi bi-tags-fill tag"></i>
        <h3 class="ps-4 mb-0">Product Infomation</h3>
      </div>
      <p class="my-3"></p>
      <!-- end of Product Infomation -->
      <div class="">
        <label for="category" class="fw-bold">Title</label>
        <i class="bi bi-asterisk asterisk "></i>
        </div>
        <input type="text" name="house_title" id="title" class="form-control">
      </div>


      <div class="my-2">
        <div>
          <label for="select" class="fw-bold">Price Type</label>
          <i class="bi bi-asterisk asterisk "></i>
        </div>
        <select class="form-select" name="price_type" aria-label="Default select example">
          <option selected value="fixed">Fixed</option>
          <option value="negotiable">Negotiable</option>
        </select>
      </div>

      <div class="my-3">
        <div>
          <label for="select" class="fw-bold">Price [#]</label>
          <i class="bi bi-asterisk asterisk "></i>
        </div>
        <input type="text" name="price" id="name" class="form-control">
      </div>

      <div class="my-3">
        <div>
          <label for="state" class="fw-bold">State</label>
          <i class="bi bi-asterisk asterisk "></i>
        </div>
        <input type="text" name="state" id="state" class="form-control">
      </div>

      <div class="my-3">
        <div>
          <label for="city" class="fw-bold">City</label>
          <i class="bi bi-asterisk asterisk "></i>
        </div>
        <input type="text" name="city" id="City" class="form-control">
      </div>

      <div class="my-3">
        <div>
          <label for="town" class="fw-bold">Town</label>
          <i class="bi bi-asterisk asterisk "></i>
        </div>
        <input type="text" name="town" id="town" class="form-control">
      </div>

      <div class="my-3">
        <div>
          <label for="bedroom" class="fw-bold">Bedroom</label>
        </div>
        <input type="tel" name="bedroom" id="bedroom" class="form-control">
      </div>

      <div class="my-3">
        <div>
          <label for="toilet" class="fw-bold">Toilet</label>
        </div>
        <input type="tel" name="toilet" id="toilet" class="form-control">
      </div>

      <div class="my-3">
        <div>
          <label for="business" class="fw-bold">Business Name</label>
        </div>
        <input type="text" name="business_name" id="business" class="form-control">
      </div>


      <div class="my-3">
        <div>
          <label for="description" class="fw-bold form-control">Business Description</label>
        </div>
        <textarea name="business_description" id="mytextarea" cols="50" rows="10"></textarea>
      </div>
      <!-- features -->
      <div class="d-flex align-items-center text-center">
        <i class="bi bi-tags-fill tag"></i>
        <h3 class="ps-4 mb-0">Features</h3>
      </div>
      <p class="my-3"></p>
      <!-- end of features -->
      <div class="my-3">
        <div>
          <label for="feature" class="fw-bold">Features List</label>
          
        </div>
        <textarea name="house_feature" id="" class="feat"></textarea>
        <p class="opacity-50">write a feature in each line e.g</p>
        <p class="opacity-50">Feature 1</p>
        <p class="opacity-50">Feature 2</p>
        <p class="opacity-50">...</p>
      </div>
      <!-- open hours -->

      <!--<div class="d-flex align-items-center text-center">
        <i class="bi bi-tags-fill tag"></i>
        <h3 class="ps-4 mb-0">Open Hours</h3>
      </div>
      <p class="my-3"></p>

     
      <div class="my-4">

        <div class="d-flex align-items-center text-center">
          <input type="checkbox" name="click" id="">
          <h6 class="ps-3 my-1">Active Opening Hours</h6>
        </div>
        <p class="fs-6 opacity-50">Define your weekly opening hours</p>

        <div class="d-flex align-items-center text-center position-relative">
          <h6>Monday</h6>
          <div class="d-flex align-items-center text-center mb-1 ps-5">
            <input type="checkbox" name="click" id="">
            <p class="my-1 ps-2">Open</p>
          </div>
        </div>
        <div class="d-flex align-items-center text-center">
          <h6>Tuesday</h6>
          <div class="d-flex align-items-center text-center ps-5  mb-1 tuesday">
            <input type="checkbox" name="click" id="">
            <p class="my-1 ps-2">Open</p>
          </div>
        </div>
        <div class="d-flex align-items-center text-center">
          <h6>Wednesday</h6>
          <div class="d-flex align-items-center text-center ps-4 mb-1 wednesday">
            <input type="checkbox" name="click" id="">
            <p class="my-1 ps-2">Open</p>
          </div>
        </div>
        <div class="d-flex align-items-center text-center ">
          <h6>Thursday</h6>
          <div class="d-flex align-items-center text-center ps-5 mb-1 thursday">
            <input type="checkbox" name="click" id="">
            <p class="my-1 ps-2">Open</p>
          </div>
        </div>
        <div class="d-flex align-items-center text-center">
          <h6>Friday</h6>
          <div class="d-flex align-items-center text-center ps-5  mb-1 friday">
            <input type="checkbox" name="click" id="">
            <p class="my-1 ps-2">Open</p>
          </div>
        </div>
        <div class="d-flex align-items-center text-center ">
          <h6>Saturday</h6>
          <div class="d-flex align-items-center text-center ps-5 mb-1 saturday">
            <input type="checkbox" name="click" id="">
            <p class="my-1 ps-2">Open</p>
          </div>
        </div>
        <div class="d-flex align-items-center text-center ">
          <h6>Sunday</h6>
          <div class="d-flex align-items-center text-center ps-5 mb-1 sunday">
            <input type="checkbox" name="click" id="">
            <p class="my-1 ps-2">Open</p>
          </div>
        </div>

        <div class="d-flex align-items-center text-center">
          <input type="checkbox" name="click" id="">
          <h6 class="ps-3 my-1">Special Hours - overrides</h6>
        </div>

      </div> -->

      <!-- images -->
      <div class="d-flex align-items-center text-center">
        <i class="bi bi-tags-fill tag"></i>
        <h3 class="ps-4 mb-0">Image</h3>
      </div>
      <p class="border-bottom my-3"></p>
      <!-- end of image -->
      <div class="my-3">
        <!-- code for the image -->
        <label for="bedroom" class="form-label fw-bold my-3 mb-0">
        </label>

        <input type="file" name="files[]" id="file" multiple>

        <div class="board mt-3 pt-3 pb-3">
          <p>Recommended image size to (870x493)px</p>
          <p>Image maximum size 128 MB.</p>
          <P>Allowed image type (png, jpg, jpeg, webp).</P>
          <P>You can upload up to 10 images</P>
        </div>
      </div>

      <!-- video -->
      <div class="d-flex align-items-center text-center">
        <i class="bi bi-tags-fill tag"></i>
        <h3 class="ps-4 mb-0">Video URL</h3>
      </div>
      <p class="my-3"></p>
      <!-- end of video -->
      <div class="my-4">

        <label for="bedroom" class="form-label fw-bold my-3 mb-0">
        </label>

        <input type="text" name="video" id="video" class="form-control" placeholder="Only YouTube & Vimeo URL">
        <p class="fs-6 opacity-50 mb-5">E.g. https//www.youtube.com/watch</p>
      </div>


      <!-- contact details -->
      <div class="d-flex align-items-center text-center">
        <i class="bi bi-tags-fill tag"></i>
        <h3 class="ps-4 mb-0">Contact Details</h3>
      </div>
      <p class="my-3"></p>
      <!-- end of video -->
      <div class="my-4">
        <!-- state -->
        <div>
          <label for="state" class="fw-bold">State</label>
          <i class="bi bi-asterisk asterisk "></i>
        </div>
        <input type="text" name="contact_state" id="state" class="form-control">
        <!-- Address -->
        <div>
          <label for="address" class="fw-bold">Address</label>
          <i class="bi bi-asterisk asterisk"></i>
        </div>
        <input type="text" name="contact_address" id="address" class="form-control pt-3 pb-4">
        <!-- phone -->
        <div>
          <label for="phone" class="fw-bold">Phone</label>
          <i class="bi bi-asterisk asterisk"></i>
        </div>
        <input type="tel" name="contact_phone" id="phone" class="form-control">
        <!-- Whatsapp Number -->
        <div>
          <label for="town" class="fw-bold">Whatsapp Number</label>
        </div>
        <input type="tel" name="whatsapp_number" id="Number" class="form-control">
        <div class="mb-3">
          <p class="opacity-50">Whatsapp number with your country code</p>
          <p class="opacity-50">e.g +1xxxxxxxxx</p>
        </div>
        <!-- Email -->
        <div>
          <label for="email" class="fw-bold">Email</label>
          <i class="bi bi-asterisk asterisk "></i>
        </div>
        <input type="email" name="contact_email" id="email" class="form-control">
        <p class="mb-3 opacity-50">Active Email</p>
        <!-- Website -->
        <div>
          <label for="website" class="fw-bold">Website</label>
        </div>
        <input type="text" name="website" id="website" class="form-control">
        <p class="mb-3 opacity-50">e.g. https//www.example.com</p>
        <!-- Map -->
        <div class="my-4">
          <div>
            <label for="map" class="fw-bold">Map</label>
          </div>
          <div class="map"></div>
        </div>

      </div>

      <!--Social Profile -->
      <div class="d-flex align-items-center text-center">
        <i class="bi bi-tags-fill tag"></i>
        <h3 class="ps-4 mb-0">Social Profile</h3>
      </div>
      <p class="my-3"></p>
      <!-- end Social Profile -->

      <div>
        <!-- facebook -->
        <div class="my-3">
          <div>
            <label for="facebook" class="fw-bold">Facebook</label>
          </div>
          <input type="text" name="facebook" id="facebook" class="form-control">
        </div>
        <!-- twitter -->
        <div class="my-3">
          <div>
            <label for="twitter" class="fw-bold">Twitter</label>
          </div>
          <input type="text" name="twitter" id="twitter" class="form-control">
        </div>
        <!-- youtube-->
        <div class="my-3">
          <div>
            <label for="youtube" class="fw-bold">Youtube</label>
          </div>
          <input type="text" name="youtube" id="youtube" class="form-control">
        </div>
        <!-- instagram-->
        <div class="my-3">
          <div>
            <label for="instagram" class="fw-bold">Instagram</label>
          </div>
          <input type="text" name="instagram" id="instagram" class="form-control">
        </div>
        <!-- linkedin-->
        <div class="my-3">
          <div>
            <label for="linkedin" class="fw-bold">Linkedin</label>
          </div>
          <input type="text" name="linkedin" id="linkedin" class="form-control">
        </div>


      <div class="d-flex align-items-center text-center">
        <input type="checkbox" name="agreement" value="yes">
        <h6 class="ps-3 my-1">I have read and agree to the website <span>terms and condition</span></h6>
      </div>
      <button type="submit" name="house-btn" id="house_btn" class="btn btn-danger my-3 ps-4 pe-4">Submit</button>
    </form>
  </section>

  <!-- End of form -->
  

  

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/sweetalert.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>
