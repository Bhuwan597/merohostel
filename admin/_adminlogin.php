<?php require("../backend/dbconfig.php");
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $sql = "SELECT * FROM `merohostel_admin` WHERE `email`='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
                     while($row = $result->fetch_assoc()) {
                            if(password_verify($password,$row['password'])){
                                        echo true;
                                        session_start();
                                        $_SESSION["adminlogin"] = true;
                                        $_SESSION["adminname"] = $row['name'];
                                        $_SESSION["adminemail"] = $row['email'];
                                    }
                                    else{
                                             echo "Invalid Credentials3.";
                                            }
                        }
                 }else{
                         echo "Invalid Credentials.";
                     }
        }   else{
             echo "Invalid Credentials";
             header("location: adminlogin.php");
                exit();
    }
?>