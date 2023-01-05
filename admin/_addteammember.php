<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php
require("../backend/dbconfig.php");
if(isset($_POST['name']) && isset($_POST['imagelink']) &&  isset($_POST['role']) &&  isset($_POST['description'])  && isset($_POST['profilelink'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $imagelink = mysqli_real_escape_string($conn,$_POST['imagelink']);
    $role = mysqli_real_escape_string($conn,$_POST['role']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $profilelink = mysqli_real_escape_string($conn,$_POST['profilelink']);
    $sql = "INSERT INTO `merohostel_team` (`name`, `imagelink`,`role`,`description`,`profilelink`) VALUES ('$name', '$imagelink','$role','$description','$profilelink');";
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