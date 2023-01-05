<?php require("../backend/dbconfig.php");
if(isset($_POST['happystudents']) && isset($_POST['registeredmembers']) && isset($_POST['availablehostelstudents']) && isset($_POST['admissions'])){
    $happystudents = mysqli_real_escape_string($conn,$_POST['happystudents']);
    $registeredmembers = mysqli_real_escape_string($conn,$_POST['registeredmembers']);
    $availablehostelstudents = mysqli_real_escape_string($conn,$_POST['availablehostelstudents']);
    $admissions = mysqli_real_escape_string($conn,$_POST['admissions']);
    $sql = "UPDATE `merohostel_records` SET `happystudents` = '$happystudents',`registeredmembers` = '$registeredmembers',`availablehostelstudents` = '$availablehostelstudents',`admissions`= '$admissions'";
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