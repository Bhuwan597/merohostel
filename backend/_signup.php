<?php
require("../backend/dbconfig.php");
$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$phone = mysqli_real_escape_string($conn,$_POST['phone']);
$dateofbirth = mysqli_real_escape_string($conn,$_POST['dateofbirth']);
$address = mysqli_real_escape_string($conn,$_POST['address']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$hashpassword = password_hash($password, PASSWORD_DEFAULT);
$cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
$profilephoto =$_FILES['profilephoto']['name'];
$token = bin2hex(random_bytes(16));
$sourcePath = $_FILES['profilephoto']['tmp_name'];
$targetPath = "../images/" . $_FILES['profilephoto']['name'];
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['dateofbirth']) && isset($_POST['address']) && isset($_POST['password']) && isset($_POST['cpassword']) && isset($_FILES['profilephoto'])){
            if($password===$cpassword){
        $sql = "SELECT * FROM `merohostel_users` WHERE `email`='$email' OR `phone`='$phone';";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            
            echo "User Already Exists.";

        } else {
            $sql = "INSERT INTO `merohostel_users` ( `name`, `email`, `phone`, `dateofbirth`, `address`, `password`, `profilephoto`, `status`, `token` ) VALUES ( '$name', '$email', '$phone', '$dateofbirth', '$address', '$hashpassword', '$profilephoto', 'inactive', '$token');";
            if ($conn->query($sql) === TRUE) {
                move_uploaded_file($sourcePath, $targetPath);
                
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
                $mail->addAddress($email);               // Name is optional
                
                
                $mail->isHTML(true);                                  // Set email format to HTML
                
                $mail->Subject = 'Account verification';
                $mail->Body    = "<a href='/merohostel/backend/acountactivate.php?".$token."'>Click to confirm</a>"; 
                if(!$mail->send()) {
                   echo "SERVER ERROR";
                } else {
                    echo true;
                }
                

                
              } 
              else
               {
                echo "SERVER ERROR";
              }
          
        }

            }else{
                echo "Password and Confirm Password must be same.";
            }

}else{
    echo "All fields are not Set.";
}
?>