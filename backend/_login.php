<?php
if(isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password'])){
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $password= $_POST['password'];
require('dbconfig.php');
$sql = "SELECT * FROM `merohostel_users` WHERE `email`='$email' AND `phone`='$phone';";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
if ($result->num_rows > 0) {
  if(password_verify($password,$row['password'])){
if($row['status']=="active"){
echo true;
session_start();
$_SESSION['name']=$row['name'];
$_SESSION['email']=$row['email'];
$_SESSION['phone']=$row['phone'];
$_SESSION['address']=$row['address'];
$_SESSION['dateofbirth']=$row['dateofbirth'];
$_SESSION['profilephoto']=$row['profilephoto'];
$_SESSION['dateofsignup']=$row['dateofsignup'];
$_SESSION['status']=$row['status'];
}else{
    echo "You need to confirm your accout to login.";
}

  }else{
    echo"Invalid Credentials";
  }
} else {
  echo "Invalid Credentials";
}
$conn->close();
}else{
    echo"Invalid Credentials";
    header('Location: /merohostel/frontend/login.php');
    exit();
}

?>