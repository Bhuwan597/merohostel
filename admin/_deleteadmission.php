<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php
require("../backend/dbconfig.php");
$email = $_SESSION['email'];
if( isset($_POST['sn'])){
    $sn = mysqli_real_escape_string($conn,$_POST['sn']);
    $sql = "UPDATE `merohostel_admissions` SET `merohostel_admissions`.`status`='expired' WHERE `sn`='$sn'";
    if(mysqli_query($conn,$sql) == "1"){
        $sql = "UPDATE `merohostel_users` SET `merohostel_users`.`admitted`='no' WHERE `email` ='$email'; ";
        if(mysqli_query($conn,$sql)){
            echo true;
        }
    }else{
        echo false;
    }
}else{
    echo false;
    exit();
}
?>