<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php
require("../backend/dbconfig.php");
if( isset($_POST['name'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $sql = "DELETE FROM `merohostel_team` WHERE `merohostel_team`.`name` = '$name';";
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