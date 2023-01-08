<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
    header("location: adminlogin.php");
    exit();
}
?>
<?php
require("../backend/dbconfig.php");
if( isset($_POST['delete'])){
    $sql = "DELETE FROM `merohostel`.`merohostel_contactus`";
    if(mysqli_query($conn,$sql) == "1"){
    echo true;
    }
    else{
        echo false;
    }
}else{
    echo false;
    exit();
}
?>