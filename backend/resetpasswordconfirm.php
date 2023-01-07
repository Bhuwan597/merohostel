<?php
require("dbconfig.php");
$password = $_POST['password'];
$passwordsecure = password_hash($_POST['password'], PASSWORD_DEFAULT); 
$cpassword = $_POST['cpassword'];
$token = $_POST['token'];
$email = $_POST['email'];
if($password && $cpassword){
    $sql ="SELECT * FROM `merohostel_users` WHERE `token`='$token' AND `email`='$email';";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
        if ($result->num_rows > 0) {
            $sql = "UPDATE `merohostel_users` SET `merohostel_users`.`password`='$passwordsecure',`merohostel_users`.`token`='0',`merohostel_users`.`status`='active';";
            $result = $conn->query($sql);
            if($result===true){
                echo true;
            }else{
             echo"SERVER ERROR";
            }
         }else{
             echo "Invalid Link.";
         }

}else{
    header("location: ../frontend/index.php");
    exit();
}

?>