

<?php require("_links.php"); session_start();?>
<?php require("../backend/dbconfig.php"); ?>
<?php
require("../backend/dbconfig.php");
if(isset($_COOKIE['email']) && isset($_COOKIE['phone'])){
    $email= $_COOKIE['email'];
    $phone= $_COOKIE['phone'];
    $sql = "SELECT * FROM `merohostel_users` WHERE  `email`='$email' AND `phone`='$phone';";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    if ($result->num_rows > 0) {
        $_SESSION['name']=$row['name'];
        $_SESSION['email']=$row['email'];
        $_SESSION['phone']=$row['phone'];
        $_SESSION['address']=$row['address'];
        $_SESSION['dateofbirth']=$row['dateofbirth'];
        $_SESSION['profilephoto']=$row['profilephoto'];
        $_SESSION['dateofsignup']=$row['dateofsignup'];
        $_SESSION['status']=$row['status'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mero Hoste-Boys Residency</title>
</head>
<style>
    body{
        overflow-x: hidden;
    }
</style>
<body>
    <?php require("navbar.php");?>
    <?php require("body.php");?>
    <?php require("services.php");?>
    <?php require("pricing.php");?>
    <?php require("gallery.php");?>
    <?php require("aboutus.php");?>
    <?php require("mapwithcontactus.php");?>
    <?php require("footer.php");?>
</body>
</html>