<?php

session_start();
include "../database/connection.php";

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}
$output = '';

$sql = "SELECT * FROM past_question WHERE course_title LIKE '%{$_POST['query']}%' ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows){
    while($row = $result->fetch_assoc()){
        $user_id = $row['user_id'];
        $sql1 = "SELECT * FROM users WHERE user_id='$user_id'";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        if($result1->num_rows){
            $row1 = $result1->fetch_assoc();
            $name = $row1['lastname'] . " " . $row1['firstname'];
            $department = $row1['department'];
        }
    $output .= '
    <body>
    <section class="container-fluid login-wrapper pt-1">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6">
                <div class="login-form">
          
                <h2 class="pt-5" style="font-size: 3rem; line-height: 1.3;">'.$row['course_title'].'</h2>
                <span style="font-weight: 500; font-size: 1.7rem;">Faculty: '.$row1['faculty'].'</span><br />
                <span style="font-weight: 500; font-size: 1.7rem;">Department: '.$department.'</span><br />
                <span style="font-weight: 500; font-size: 1.7rem;">School: '.$row1['school'].'</span><br />
                <span style="font-weight: 500; font-size: 1.7rem;">Answered: '.$row['type'].'</span>
                <form id="profile_form">                         
                    <div class="form-group">
                        <a href="download.php?path='.$row['file'].'" i style="padding: 1rem 3rem;" class="getStarted-btn">Download Past Question</a>
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
    <section class="container-fluid login-wrapper pt-2">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6">
                <div class="login-form text-center">
          
                <h2 class="pt-5" style="font-size: 7rem; line-height: 1.3;"><i class="bi bi-x-circle-fill text-danger"></i></h2> 
                <span style="font-size: 1.8rem;">No Past Question</span>             
               
            </div>
                </div>
            </div>
           
        </div>
    </section>


    ';
}




        echo $output;