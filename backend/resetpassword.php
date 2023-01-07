<?php
if(isset($_POST['emailtoreset'])){
    $emailtoreset= $_POST['emailtoreset'];
    require("dbconfig.php");
    $sql= "SELECT * FROM `merohostel_users` WHERE `email`='$emailtoreset';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $token = bin2hex(random_bytes(16));
        require 'PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer();
                                        // Enable verbose debug output   
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->IsSMTP();
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'baupea1481@gmail.com';                 // SMTP username
        $mail->Password = 'qtgmaovompetxofh';                           // SMTP password
        $mail->SMTPSecure = 'tls';                          
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->SetFrom("baupea1481@gmail.com", "Mero Hostel");
        $mail->addAddress($emailtoreset);               // Name is optional
        // $mail->addAttachment();
        
        $mail->isHTML(true);                                  // Set email format to HTML
        
        $mail->Subject = 'Password Reset';
        $mail->Body    = "Click here to reset your account password<br> http://localhost/merohostel/backend/_resetpassword.php?token=".$token."&email=".$emailtoreset; 
        if(!$mail->send()) {
           echo "SERVER ERROR";

        } else {
            $sql = "UPDATE `merohostel_users` SET `merohostel_users`.`status`='inactive', `merohostel_users`.`token`='$token' WHERE `email`='$emailtoreset';";
            if ($conn->query($sql) === TRUE) {
                echo true;
              } 
              else
               {
                echo "SERVER ERROR";
              }
        }

    }else{
        echo "User Does Not Exists.";
    }
}else{
    header("location: login.php");
    exit();
}
?>