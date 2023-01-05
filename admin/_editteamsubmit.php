<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php
require("../backend/dbconfig.php");
if(isset($_POST['editname']) && isset($_POST['editimagelink']) && isset($_POST['editrole']) && isset($_POST['editdescription']) && isset($_POST['editprofilelink'])){
    $editname = mysqli_real_escape_string($conn,$_POST['editname']);
    $editimagelink = mysqli_real_escape_string($conn,$_POST['editimagelink']);
    $editrole = mysqli_real_escape_string($conn,$_POST['editrole']);
    $editdescription = mysqli_real_escape_string($conn,$_POST['editdescription']);
    $editprofilelink = mysqli_real_escape_string($conn,$_POST['editprofilelink']);
    $sql = "UPDATE `merohostel_team` SET `imagelink` = '$editimagelink',`role` = '$editrole',`description`= '$editdescription',`profilelink`='$editprofilelink' WHERE `name`='$editname'";
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