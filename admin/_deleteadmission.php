<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php
require("../backend/dbconfig.php");
if( isset($_POST['sn'])){
    $sn = mysqli_real_escape_string($conn,$_POST['sn']);
    $sql = "DELETE FROM `merohostel_admissions` WHERE `merohostel_admissions`.`sn` = '$sn';";
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