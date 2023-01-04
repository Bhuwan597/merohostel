<?php
require("../backend/dbconfig.php");
if( isset($_POST['menu'])){
    $menu = mysqli_real_escape_string($conn,$_POST['menu']);
    $sql = "DELETE FROM `merohostel_navbar` WHERE `merohostel_navbar`.`menu` = '$menu';";
    if(mysqli_query($conn,$sql) == "1"){
    echo true;
    }else{
        echo false;
    }
}else{
    echo false;
}
?>