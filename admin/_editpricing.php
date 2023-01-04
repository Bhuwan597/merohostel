<?php require("../backend/dbconfig.php");
if(isset($_POST['onesitterprice']) && isset($_POST['twositterprice']) && isset($_POST['threesitterprice'])){
    $onesitterprice = mysqli_real_escape_string($conn,$_POST['onesitterprice']);
    $twositterprice = mysqli_real_escape_string($conn,$_POST['twositterprice']);
    $threesitterprice = mysqli_real_escape_string($conn,$_POST['threesitterprice']);
    $sql = "UPDATE `merohostel_pricing` SET `onesitterprice` = '$onesitterprice',`twositterprice` = '$twositterprice',`threesitterprice` = '$threesitterprice'";
    if(mysqli_query($conn,$sql) == "1"){
    echo true;
    }else{
        echo false;
    }

}else{
    echo false;
}


?>