<?php session_start();?>
<?php require("dbconfig.php"); ?>
<?php
if(!isset($_SESSION['email']) && !isset($_SESSION['phone'])){
    header("location: login.php");
    exit();
}
?>
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$duration = $_POST['duration'];
$sitter = $_POST['sitter'];
$profilephoto = $_POST['profilephoto'];
$token = bin2hex(random_bytes(16));
if($name && $email && $phone && $address && $duration && $sitter && $profilephoto){
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
    $mail->addAddress("baupea1481@gmail.com");               // Name is optional
    // $mail->addAttachment();
    
    $mail->isHTML(true);                                  // Set email format to HTML
    
    $mail->Subject = 'Confirm Admission';
    $mail->Body    = "<label>Name:</label>&nbsp; &nbsp;<span>".$name."</span>
    <br>
     <label>Email:</label>&nbsp; &nbsp;<span>".$email."</span>
    <br>
     <label>Phone:</label>&nbsp; &nbsp;<span>".$phone."</span>
    <br>
     <label>Address:</label>&nbsp; &nbsp;<span>".$address."</span>
    <br>
     <label>Duration:</label>&nbsp; &nbsp;<span>".$duration." Months</span>
    <br>
     <label>Sitter:</label>&nbsp; &nbsp;<span>".$sitter." Sitter</span>
    <br>
    Click here to confirm this admission: http://localhost/merohostel/backend/_confirmadmission.php?email=".$email."&token="."$token;
    "; 
    if(!$mail->send()) {
       echo "SERVER ERROR";

    } else {
        $sql = "INSERT INTO `merohostel_admissions` ( `name`, `email`, `phone`, `profilephoto`, `duration`, `sitter`, `address`,`token`) VALUES ('$name', '$email', '$phone', '$profilephoto', '$duration', '$sitter', '$address','$token');";
        $result = mysqli_query($conn, $sql);
        if($result==true){
echo true;
        }
    }
}else{
    echo"Invalid Form Details";
}

?>