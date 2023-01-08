    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<?php
    if(isset($_GET['token'])){
        require("dbconfig.php");
        $token=$_GET['token'];
        $email=$_GET['email'];
    $sql = "SELECT * FROM `merohostel_users` WHERE  `token`='$token' AND `email`='$email';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);
      $name= $row['name'];
        $sql = "UPDATE `merohostel_users` SET `merohostel_users`.`status`='active', `merohostel_users`.`token`='0' WHERE `token`='$token';";
        if($conn->query($sql)===true){
          $sql = "CREATE TABLE `merohostel`.`merohostel_$email` (`sn` INT(11) NOT NULL AUTO_INCREMENT , `message` VARCHAR(255) NOT NULL , `dateofmessage` VARCHAR(255) NOT NULL , PRIMARY KEY (`sn`)) ENGINE = InnoDB;";
          mysqli_query($conn,$sql);
            echo '<html lang="en">
            <head>
              <meta charset="utf-8" />
              <meta name="viewport" content="width=device-width, initial-scale=1" />
              <title>Account Activation</title>
              <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
            </head>
            <body>
              <header class="text-center">
                <div class="container">
                  <div class="h1 p-4">Welcome To Mero Hostel!</div>
                  <div class="h4 text-uppercase">Your account has been activated. Proceed for login.</div>
                  <a class="btn btn-primary btn-xl text-uppercase" href="/merohostel/frontend/login.php">Go for Login</a>
                </div>
              </header>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
            </body>
          </html>';

          require 'PHPMailer/PHPMailerAutoload.php';
          $mail = new PHPMailer();                            // Enable verbose debug output   
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->IsSMTP();
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'baupea1481@gmail.com';                 // SMTP username
          $mail->Password = 'qtgmaovompetxofh';                           // SMTP password
          $mail->SMTPSecure = 'tls';                          
          $mail->Port = 587;                                    // TCP port to connect to
          $mail->SetFrom("baupea1481@gmail.com", "Mero Hostel");
          $mail->addAddress($email);               // Name is optional
          // $mail->addAttachment();
          $mail->isHTML(true);                                  // Set email format to HTML
          
          $mail->Subject = 'Account Activated';
          $mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
          <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
              <meta name="viewport" content="width=device-width, initial-scale=1.0" />
              <meta name="x-apple-disable-message-reformatting" />
              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
              <meta name="color-scheme" content="light dark" />
              <meta name="supported-color-schemes" content="light dark" />
              <title></title>
              <style type="text/css" rel="stylesheet" media="all">
                /* Base ------------------------------ */
          
                @import url("https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&display=swap");
                body {
                  width: 100% !important;
                  height: 100%;
                  margin: 0;
                  -webkit-text-size-adjust: none;
                }
          
                a {
                  color: #3869D4;
                }
          
                a img {
                  border: none;
                }
          
                td {
                  word-break: break-word;
                }
          
                .preheader {
                  display: none !important;
                  visibility: hidden;
                  mso-hide: all;
                  font-size: 1px;
                  line-height: 1px;
                  max-height: 0;
                  max-width: 0;
                  opacity: 0;
                  overflow: hidden;
                }
                /* Type ------------------------------ */
          
                body,
                td,
                th {
                  font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
                }
          
                h1 {
                  margin-top: 0;
                  color: #333333;
                  font-size: 22px;
                  font-weight: bold;
                  text-align: left;
                }
          
                h2 {
                  margin-top: 0;
                  color: #333333;
                  font-size: 16px;
                  font-weight: bold;
                  text-align: left;
                }
          
                h3 {
                  margin-top: 0;
                  color: #333333;
                  font-size: 14px;
                  font-weight: bold;
                  text-align: left;
                }
          
                td,
                th {
                  font-size: 16px;
                }
          
                p,
                ul,
                ol,
                blockquote {
                  margin: .4em 0 1.1875em;
                  font-size: 16px;
                  line-height: 1.625;
                }
          
                p.sub {
                  font-size: 13px;
                }
                /* Utilities ------------------------------ */
          
                .align-right {
                  text-align: right;
                }
          
                .align-left {
                  text-align: left;
                }
          
                .align-center {
                  text-align: center;
                }
          
                .u-margin-bottom-none {
                  margin-bottom: 0;
                }
                /* Buttons ------------------------------ */
          
                .button {
                  background-color: #3869D4;
                  border-top: 10px solid #3869D4;
                  border-right: 18px solid #3869D4;
                  border-bottom: 10px solid #3869D4;
                  border-left: 18px solid #3869D4;
                  display: inline-block;
                  color: #FFF;
                  text-decoration: none;
                  border-radius: 3px;
                  box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
                  -webkit-text-size-adjust: none;
                  box-sizing: border-box;
                }
          
                .button--green {
                  background-color: #22BC66;
                  border-top: 10px solid #22BC66;
                  border-right: 18px solid #22BC66;
                  border-bottom: 10px solid #22BC66;
                  border-left: 18px solid #22BC66;
                }
          
                .button--red {
                  background-color: #FF6136;
                  border-top: 10px solid #FF6136;
                  border-right: 18px solid #FF6136;
                  border-bottom: 10px solid #FF6136;
                  border-left: 18px solid #FF6136;
                }
          
                @media only screen and (max-width: 500px) {
                  .button {
                    width: 100% !important;
                    text-align: center !important;
                  }
                }
                /* Attribute list ------------------------------ */
          
                .attributes {
                  margin: 0 0 21px;
                }
          
                .attributes_content {
                  background-color: #F4F4F7;
                  padding: 16px;
                }
          
                .attributes_item {
                  padding: 0;
                }
                /* Related Items ------------------------------ */
          
                .related {
                  width: 100%;
                  margin: 0;
                  padding: 25px 0 0 0;
                  -premailer-width: 100%;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                }
          
                .related_item {
                  padding: 10px 0;
                  color: #CBCCCF;
                  font-size: 15px;
                  line-height: 18px;
                }
          
                .related_item-title {
                  display: block;
                  margin: .5em 0 0;
                }
          
                .related_item-thumb {
                  display: block;
                  padding-bottom: 10px;
                }
          
                .related_heading {
                  border-top: 1px solid #CBCCCF;
                  text-align: center;
                  padding: 25px 0 10px;
                }
                /* Discount Code ------------------------------ */
          
                .discount {
                  width: 100%;
                  margin: 0;
                  padding: 24px;
                  -premailer-width: 100%;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                  background-color: #F4F4F7;
                  border: 2px dashed #CBCCCF;
                }
          
                .discount_heading {
                  text-align: center;
                }
          
                .discount_body {
                  text-align: center;
                  font-size: 15px;
                }
                /* Social Icons ------------------------------ */
          
                .social {
                  width: auto;
                }
          
                .social td {
                  padding: 0;
                  width: auto;
                }
          
                .social_icon {
                  height: 20px;
                  margin: 0 8px 10px 8px;
                  padding: 0;
                }
                /* Data table ------------------------------ */
          
                .purchase {
                  width: 100%;
                  margin: 0;
                  padding: 35px 0;
                  -premailer-width: 100%;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                }
          
                .purchase_content {
                  width: 100%;
                  margin: 0;
                  padding: 25px 0 0 0;
                  -premailer-width: 100%;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                }
          
                .purchase_item {
                  padding: 10px 0;
                  color: #51545E;
                  font-size: 15px;
                  line-height: 18px;
                }
          
                .purchase_heading {
                  padding-bottom: 8px;
                  border-bottom: 1px solid #EAEAEC;
                }
          
                .purchase_heading p {
                  margin: 0;
                  color: #85878E;
                  font-size: 12px;
                }
          
                .purchase_footer {
                  padding-top: 15px;
                  border-top: 1px solid #EAEAEC;
                }
          
                .purchase_total {
                  margin: 0;
                  text-align: right;
                  font-weight: bold;
                  color: #333333;
                }
          
                .purchase_total--label {
                  padding: 0 15px 0 0;
                }
          
                body {
                  background-color: #F2F4F6;
                  color: #51545E;
                }
          
                p {
                  color: #51545E;
                }
          
                .email-wrapper {
                  width: 100%;
                  margin: 0;
                  padding: 0;
                  -premailer-width: 100%;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                  background-color: #F2F4F6;
                }
          
                .email-content {
                  width: 100%;
                  margin: 0;
                  padding: 0;
                  -premailer-width: 100%;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                }
                /* Masthead ----------------------- */
          
                .email-masthead {
                  padding: 25px 0;
                  text-align: center;
                }
          
                .email-masthead_logo {
                  width: 94px;
                }
          
                .email-masthead_name {
                  font-size: 16px;
                  font-weight: bold;
                  color: #A8AAAF;
                  text-decoration: none;
                  text-shadow: 0 1px 0 white;
                }
                /* Body ------------------------------ */
          
                .email-body {
                  width: 100%;
                  margin: 0;
                  padding: 0;
                  -premailer-width: 100%;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                }
          
                .email-body_inner {
                  width: 570px;
                  margin: 0 auto;
                  padding: 0;
                  -premailer-width: 570px;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                  background-color: #FFFFFF;
                }
          
                .email-footer {
                  width: 570px;
                  margin: 0 auto;
                  padding: 0;
                  -premailer-width: 570px;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                  text-align: center;
                }
          
                .email-footer p {
                  color: #A8AAAF;
                }
          
                .body-action {
                  width: 100%;
                  margin: 30px auto;
                  padding: 0;
                  -premailer-width: 100%;
                  -premailer-cellpadding: 0;
                  -premailer-cellspacing: 0;
                  text-align: center;
                }
          
                .body-sub {
                  margin-top: 25px;
                  padding-top: 25px;
                  border-top: 1px solid #EAEAEC;
                }
          
                .content-cell {
                  padding: 45px;
                }
                /*Media Queries ------------------------------ */
          
                @media only screen and (max-width: 600px) {
                  .email-body_inner,
                  .email-footer {
                    width: 100% !important;
                  }
                }
          
                @media (prefers-color-scheme: dark) {
                  body,
                  .email-body,
                  .email-body_inner,
                  .email-content,
                  .email-wrapper,
                  .email-masthead,
                  .email-footer {
                    background-color: #333333 !important;
                    color: #FFF !important;
                  }
                  p,
                  ul,
                  ol,
                  blockquote,
                  h1,
                  h2,
                  h3,
                  span,
                  .purchase_item {
                    color: #FFF !important;
                  }
                  .attributes_content,
                  .discount {
                    background-color: #222 !important;
                  }
                  .email-masthead_name {
                    text-shadow: none !important;
                  }
                }
          
                :root {
                  color-scheme: light dark;
                  supported-color-schemes: light dark;
                }
              </style>
              <!--[if mso]>
                <style type="text/css">
                  .f-fallback  {
                    font-family: Arial, sans-serif;
                  }
                </style>
              <![endif]-->
            </head>
            <body>
              <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                  <td align="center">
                    <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                      <tr>
                        <td class="email-masthead">
                          <a href="#" class="f-fallback email-masthead_name">Mero Hostel</a>
                        </td>
                      </tr>
                      <!-- Email Body -->
                      <tr>
                        <td class="email-body" width="570" cellpadding="0" cellspacing="0">
                          <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                            <!-- Body content -->
                            <tr>
                              <td class="content-cell">
                                <div class="f-fallback">
                                  <h1>Hi '.$name.',</h1>
                                  <p><strong>Your Account is now activated</strong></p>
                                  <!-- Action -->
                                  <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation"></table>
                                  <p>Thanks, <br />Mero Hostel Team</p>
                                  <!-- Sub copy -->
                                </div>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </body>
          </html>
          ';
          $mail->send();
        }else{
            echo '<!DOCTYPE html>
            <html lang="en">
              <head>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <title>Account Activation</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
              </head>
              <body>
                <header class="text-center">
                  <div class="container">
                    <div class="h1 text-danger p-4">Failed to Activate your Account!</div>
                    <div class="h4 text-uppercase">Please try again.</div>
                    <a class="btn btn-primary btn-xl text-uppercase" href="/merohostel/frontend/index.php">Back to Homepage</a>
                  </div>
                </header>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
              </body>
            </html>
            ';
        }

} else {
    
    echo '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Account Activation</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
      </head>
      <body>
        <header class="text-center">
          <div class="container">
            <div class="h1 text-danger p-4">Failed to Activate your Account!</div>
            <div class="h4 text-uppercase">Please try again.</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="/merohostel/frontend/index.php">Back to Homepage</a>
          </div>
        </header>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      </body>
    </html>
    ';
        }
    }else{
        header('Location: /merohostel/frontend/index.php');
        exit();
    }
?>