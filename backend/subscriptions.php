<?php
if(!isset($_POST['email'])){
    header("location: ../frontend/index.php");
    exit();
}
require("dbconfig.php");
$email = $_POST['email'];
$sql = "SELECT * FROM `merohostel_subscriptions` WHERE `email`='$email';";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "Email already subscribed to mero hostel.";
    }else{
        $sql = "INSERT INTO `merohostel_subscriptions` (`email`) VALUES ( '$email');";
        $result = $conn->query($sql);
        if($result === true){
            echo true;
        }else{
            echo "Server Error";
        }
    }


?>