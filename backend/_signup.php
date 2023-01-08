<?php
require("../backend/dbconfig.php");
$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$phone = mysqli_real_escape_string($conn,$_POST['phone']);
$dateofbirth = mysqli_real_escape_string($conn,$_POST['dateofbirth']);
$address = mysqli_real_escape_string($conn,$_POST['address']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$hashpassword = password_hash($password, PASSWORD_DEFAULT);
$cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
$profilephoto =$_FILES['profilephoto']['name'];
$token = bin2hex(random_bytes(16));
$sourcePath = $_FILES['profilephoto']['tmp_name'];
$targetPath = "../images/" . $_FILES['profilephoto']['name'];
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['dateofbirth']) && isset($_POST['address']) && isset($_POST['password']) && isset($_POST['cpassword']) && isset($_FILES['profilephoto'])){
            if($password===$cpassword){
        $sql = "SELECT * FROM `merohostel_users` WHERE `email`='$email' OR `phone`='$phone';";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            
            echo "User Already Exists.";

        } else {
                            
            require 'PHPMailer/PHPMailerAutoload.php';
    
            $mail = new PHPMailer();
                                       // Enable verbose debug output   
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->IsSMTP();
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'baupea1481@gmail.com';                 // SMTP username
            $mail->Password = 'qtgmaovompetxofh';                           // SMTP password
            $mail->SMTPSecure = 'tls';                          
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->SetFrom("baupea1481@gmail.com", "Mero Hostel");
            $mail->addAddress($email);               // Name is optional
            $mail->addAttachment($targetPath);
            
            $mail->isHTML(true);                                  // Set email format to HTML
            
            $mail->Subject = 'Account verification';
            $mail->Body    = '<!DOCTYPE html>
            <html>
              <head>
                <title></title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <style type="text/css">
                  @media screen {
                      @font-face {
                          font-family: "Lato";
                          font-style: normal;
                          font-weight: 400;
                          src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
                      }
            
                      @font-face {
                          font-family: "Lato";
                          font-style: normal;
                          font-weight: 700;
                          src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
                      }
            
                      @font-face {
                          font-family: "Lato";
                          font-style: italic;
                          font-weight: 400;
                          src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
                      }
            
                      @font-face {
                          font-family: "Lato";
                          font-style: italic;
                          font-weight: 700;
                          src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
                      }
                  }
            
                  /* CLIENT-SPECIFIC STYLES */
                  body,
                  table,
                  td,
                  a {
                      -webkit-text-size-adjust: 100%;
                      -ms-text-size-adjust: 100%;
                  }
            
                  table,
                  td {
                      mso-table-lspace: 0pt;
                      mso-table-rspace: 0pt;
                  }
            
                  img {
                      -ms-interpolation-mode: bicubic;
                  }
            
                  /* RESET STYLES */
                  img {
                      border: 0;
                      height: auto;
                      line-height: 100%;
                      outline: none;
                      text-decoration: none;
                  }
            
                  table {
                      border-collapse: collapse !important;
                  }
            
                  body {
                      height: 100% !important;
                      margin: 0 !important;
                      padding: 0 !important;
                      width: 100% !important;
                  }
            
                  /* iOS BLUE LINKS */
                  a[x-apple-data-detectors] {
                      color: inherit !important;
                      text-decoration: none !important;
                      font-size: inherit !important;
                      font-family: inherit !important;
                      font-weight: inherit !important;
                      line-height: inherit !important;
                  }
            
                  /* MOBILE STYLES */
                  @media screen and (max-width:600px) {
                      h1 {
                          font-size: 32px !important;
                          line-height: 32px !important;
                      }
                  }
            
                  /* ANDROID CENTER FIX */
                  div[style*="margin: 16px 0;"] {
                      margin: 0 !important;
                  }
                </style>
              </head>
            
              <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <!-- LOGO -->
                  <tr>
                    <td bgcolor="#FFA73B" align="center">
                      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                          <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
                      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                          <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h1 style="font-size: 48px; font-weight: 400; margin: 2;">Welcome to</h1><br><h4>Mero Hostel</h4>
                            <img src=" https://img.icons8.com/clouds/100/000000/handshake.png" width="125" height="120" style="display: block; border: 0px;" />
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                          <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">We"re excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
                          </td>
                        </tr>
                        <tr>
                          <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                  <table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="center" style="border-radius: 3px;" bgcolor="#FFA73B"><a href="#" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #FFA73B; display: inline-block;">Confirm Account</a></td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <!-- COPY -->
                        <tr>
                          <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">If that doesn"t work, copy and paste the following link in your browser:</p>
                          </td>
                        </tr>
                        <!-- COPY -->
                        <tr>
                          <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;"><a href="#" target="_main" style="color: #FFA73B;">http://localhost/merohostel/backend/accountactivate.php?token='.$token.'&email='.$email.'</a></p>
                          </td>
                        </tr>
                        <tr>
                          <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">If you have any questions, just reply to this email&mdash;we"re always happy to help out.</p>
                          </td>
                        </tr>
                        <tr>
                          <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">From,<br />Mero Hostel</p>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                          <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
                            <p style="margin: 0;"><a href="/localhost/merohostel/frontend/index.php" target="_blank" style="color: #FFA73B;">We&rsquo;re here to help you out</a></p>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;"></td>
                  </tr>
                </table>
              </body>
            </html>
            ';
            if(!$mail->send()) {
               echo "SERVER ERROR";
            } else {
                $sql = "INSERT INTO `merohostel_users` ( `name`, `email`, `phone`, `dateofbirth`, `address`, `password`, `profilephoto`, `status`, `token` ) VALUES ( '$name', '$email', '$phone', '$dateofbirth', '$address', '$hashpassword', '$profilephoto', 'inactive', '$token');";
                if ($conn->query($sql) === TRUE) {
                    move_uploaded_file($sourcePath, $targetPath);
                    echo true;
                  } 
                  else
                   {
                    echo "SERVER ERROR";
                  }
            }
     
          
        }

            }else{
                echo "Password and Confirm Password must be same.";
            }

}else{
    echo "All fields are not Set.";
}
?>