<?php require("../backend/dbconfig.php"); ?>
<?php
session_start();
if(!isset($_SESSION['email']) && !isset($_SESSION['phone'])){
    header("location: login.php");
    exit();
}
?>
<?php
$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$dateofbirth = mysqli_real_escape_string($conn,$_POST['dateofbirth']);
$address = mysqli_real_escape_string($conn,$_POST['address']);
$profilephoto =$_FILES['profilephoto']['name'];
$sourcePath = $_FILES['profilephoto']['tmp_name'];
$targetPath = "../images/" . $_FILES['profilephoto']['name'];
if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['dateofbirth']) && isset($_FILES['profilephoto'])){
    $sql= "UPDATE `merohostel_users` SET `merohostel_users`.`name`='$name',`merohostel_users`.`dateofbirth`='$dateofbirth',`merohostel_users`.`address`='$address',`merohostel_users`.`profilephoto`='$profilephoto';";
    if ($conn->query($sql) === TRUE) {
        if($profilephoto==$_SESSION['profilephoto']){
            session_destroy();
session_unset();
setcookie('phone',"", time() - 3600 ,'/');
setcookie('email',"", time() - 3600 ,'/');
echo true;

        }else{
            move_uploaded_file($sourcePath, $targetPath);
            unlink("../images/".$_SESSION['profilephoto']);
            echo true;
            session_destroy();
session_unset();
setcookie('phone',"", time() - 3600 ,'/');
setcookie('email',"", time() - 3600 ,'/');
        }
      } 
      else
       {
        echo "SERVER ERROR";
      }


}else{
    echo "Invalid Details"
;}



                  ?>