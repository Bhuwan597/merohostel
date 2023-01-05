<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php
require("../backend/dbconfig.php");
if(isset($_POST['servicetitle']) && isset($_POST['servicedescription']) && isset($_POST['serviceicon']) && isset($_POST['servicebuttonvalue']) && isset($_POST['servicebuttoncolor'])){
    $servicetitle = mysqli_real_escape_string($conn,$_POST['servicetitle']);
    $servicedescription = mysqli_real_escape_string($conn,$_POST['servicedescription']);
    $serviceicon = mysqli_real_escape_string($conn,$_POST['serviceicon']);
    $servicebuttonvalue = mysqli_real_escape_string($conn,$_POST['servicebuttonvalue']);
    $servicebuttoncolor = mysqli_real_escape_string($conn,$_POST['servicebuttoncolor']);
    $sql = "INSERT INTO `merohostel_services` (`servicetitle`, `servicedescription`, `serviceicon`,`servicebuttonvalue`,`servicebuttoncolor`) VALUES ('$servicetitle', '$servicedescription', '$serviceicon','$servicebuttonvalue','$servicebuttoncolor');";
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