<?php require("../backend/dbconfig.php"); ?>
<?php
if(!isset($_GET['email']) && !isset($_GET['token'])){
    header("location: index.php");
    exit();
}else{
    $email = $_GET['email'];
    $token = $_GET['token'];
    $sql="SELECT * FROM `merohostel_admissions` WHERE `email`='$email' AND `token`='$token';";
    $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
    $sql = "UPDATE `merohostel_admissions` SET `merohostel_admissions`.`status` = 'active',`merohostel_admissions`.`token` = '0' WHERE `email`='$email' AND `token`='$token' ;";
    if($result = mysqli_query($conn,$sql)){
        require 'PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer();                            // Enable verbose debug output   
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->IsSMTP();
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'baupea1481@gmail.com';                 // SMTP username
        $mail->Password = 'qtgmaovompetxofh';                           // SMTP password
        $mail->SMTPSecure = 'tls';                          
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->SetFrom("baupea1481@gmail.com", "Mero Hostel");
        $mail->addAddress($email);               // Name is optional
        // $mail->addAttachment();
        
        $mail->isHTML(true);                                  // Set email format to HTML
        
        $mail->Subject = 'Admission Activation';
        $mail->Body    = "<h1>Your admission has been approved for $email.</h1>";
        if(!$mail->send()) {
           echo "Admission Not Approved";
    
        } else {     
            $sql = "UPDATE `merohostel_users` SET `merohostel_users`.`admitted`='yes' WHERE `email`='$email';" ;
            mysqli_query($conn,$sql);
                echo "Booking for  ".$email."  is now approved";
        }
    }else{
            echo"Failed to conirm Admission.";
    }
  }else{
    echo "Invalid Process";
  }

}


?>