<?php

session_start();
include "../database/connection.php";

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}
$output = '';

$sql = "SELECT DISTINCT user_id,house_title,town,house_type,timestamp FROM register_house WHERE town LIKE '%{$_POST['query']}%' 

SELECT * FROM friends WHERE user_id='$incoming_id' AND status='f' ORDER BY id desc
";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows){
    while($row = $result->fetch_assoc()){
        $time = $row['timestamp'];
        $sql1 = "SELECT * FROM register_house WHERE timestamp='$time' ";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        if($result1->num_rows){
            $row1 = $result1->fetch_assoc();
                $file = $row1['file'];
        }
       
    $output .= '
    <body>
    <section class="container-fluid login-wrapper pt-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6">
                <div class="login-form">
                <img src="'.$file.'" class="img-responsive" />
                <h2 class="pt-5" style="font-size: 3rem; line-height: 1.3;">'.$row['house_title'].'</h2>
                <span style="font-weight: 500; font-size: 1.7rem;">Town: '.$row['town'].'</span><br />
                <span style="font-weight: 500; font-size: 1.7rem;">Type: '.$row['house_type'].'</span><br />
                <span style="font-weight: 500; font-size: 1.7rem;">Price: '.$row1['price'].'</span><br />
                <form id="profile_form">                         
                    <div class="form-group">
                    <a href="buy-hostel.php?time='.$row['timestamp'].'" i style="padding: 1rem 3rem;" class="getStarted-btn">'.$row['house_type'].' house</a>
                    </div>
                </form>
               
            </div><hr>
                </div>
            </div>
           
        </div>
    </section>
    ' ;
}
} else {
    $output .= '
    
    <body>
    <section class="container-fluid login-wrapper pt-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6">
                <div class="login-form">
          
                <h2 class="pt-5" style="font-size: 3rem; line-height: 1.3;">No Hostel</h2>              
               
            </div>
                </div>
            </div>
           
        </div>
    </section>


    ';
}




        echo $output;