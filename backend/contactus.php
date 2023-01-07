<?php
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message']) ){
    require('dbconfig.php');
    $name= mysqli_real_escape_string($conn,$_POST['name']);
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $phone= mysqli_real_escape_string($conn,$_POST['phone']);
    $message= mysqli_real_escape_string($conn,$_POST['message']);
    $sql = "INSERT INTO `merohostel_contactus` (`name`, `email`, `phone`, `message`) VALUES ('$name', '$email', '$phone', '$message');";
    $result = $conn->query($sql);
    if($result == true){
        echo true;
    }else{
        echo "Message Not Sent";
    }

}else{
    echo "Invalid Form Format";
}

?>