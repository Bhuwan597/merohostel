<?php
require("../backend/dbconfig.php");
if( isset($_POST['menu'])&& isset($_POST['icon']) && isset($_POST['link'])){
    $menu = mysqli_real_escape_string($conn,$_POST['menu']);
    $icon = mysqli_real_escape_string($conn,$_POST['icon']);
    $link = mysqli_real_escape_string($conn,$_POST['link']);
    $sql = "INSERT INTO `merohostel_navbar` (`menu`, `icon`, `link`) VALUES ('$menu', '$icon', '$link');";
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