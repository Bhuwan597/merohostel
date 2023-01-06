    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<?php
    if(isset($_GET['token'])){
        require("dbconfig.php");
        $token=$_GET['token'];
    $sql = "SELECT * FROM `merohostel_users` WHERE  `token`='$token';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $sql = "UPDATE `merohostel_users` SET `merohostel_users`.`status`='active', `merohostel_users`.`token`='0' WHERE `token`='$token';";
        if($conn->query($sql)===true){
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