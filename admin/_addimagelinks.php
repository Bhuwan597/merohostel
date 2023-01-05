
<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php
require("../backend/dbconfig.php");
if(isset($_POST['mainimagelink']) && isset($_POST['subimagelink'])){
    $mainimagelink = mysqli_real_escape_string($conn,$_POST['mainimagelink']);
    $subimagelink = mysqli_real_escape_string($conn,$_POST['subimagelink']);
    $sql = "INSERT INTO `merohostel_gallery` (`mainimagelink`, `subimagelink`) VALUES ('$mainimagelink', '$subimagelink');";
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