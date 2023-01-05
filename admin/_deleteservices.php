<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php
require("../backend/dbconfig.php");
if( isset($_POST['servicetitle'])){
    $servicetitle = mysqli_real_escape_string($conn,$_POST['servicetitle']);
    $sql = "DELETE FROM `merohostel_services` WHERE `merohostel_services`.`servicetitle` = '$servicetitle';";
    if(mysqli_query($conn,$sql) == "1"){
    echo true;
    }else{
        echo false;
    }
}else{
    echo false;
    exit();
}
?>