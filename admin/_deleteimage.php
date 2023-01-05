<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php
require("../backend/dbconfig.php");
if( isset($_POST['mainimagelink'])){
    $mainimagelink = mysqli_real_escape_string($conn,$_POST['mainimagelink']);
    $sql = "DELETE FROM `merohostel_gallery` WHERE `merohostel_gallery`.`mainimagelink` = '$mainimagelink';";
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