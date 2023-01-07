<?php

if($_GET['email']&&$_GET['token']){
    $token = $_GET['token'];
    $emailtoreset= $_GET['email'];
    }else{

    header("location: ../frontend/index.php");
    exit();
}

?>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid p-4">
 
<form id="resetpassword" class="form-signin needs-validation">
  <div class="card shadow-sm">
    <div class="card-body">

    <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password<span class="text-danger ,e-2">*</span></label>
                            <input name="password" type="password" id="password" class="form-control form-control-lg" required autocomplete="off"  oninput="checkpassword(document.getElementById('password').value, document.getElementById('cpassword').value)" />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="cpassword">Confirm Password<span class="text-danger ,e-2">*</span></label>
                            <input name="cpassword" type="password" id="cpassword" oninput="checkpassword(document.getElementById('password').value, document.getElementById('cpassword').value)" class="form-control form-control-lg" required autocomplete="off"/>
                            <label id="passwordvalidation"></label>
                        </div>
                        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                        <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">

      <button id="submitBtn" class="btn btn-md btn-primary btn-block" type="submit"><div id="spinner" class="spinner-border spinner-border-sm d-none me-3" role="status">
        <span class="visually-hidden"></span>
    </div>Reset</button>

    </div>
  </div>
</form>
</div>
<script>
    function checkpassword(password,cpassword){
        if(password === cpassword){
            if(password == "" && cpassword ==""){
                document.getElementById("passwordvalidation").innerHTML = '<span class="text-danger">Password cant be empty.</span>'
                return false;
                    }else{   
           document.getElementById("passwordvalidation").innerHTML = '<span class="text-success"> Password Match</span>';
           return true;
        }
    }else{
        document.getElementById("passwordvalidation").innerHTML = '<span class="text-danger">Password Missmatch</span>';
        return false;
            }
    }
</script>
<script>
    $("#resetpassword").submit(function(e){
    e.preventDefault();
    $("#spinner").removeClass("d-none");
    let password = $("#password").val();
   let confirmpassword = $("#cpassword").val();
    if(checkpassword(password,confirmpassword) == false){
        $("#spinner").addClass("d-none");
        swal({
  title: "Error!",
  text: "Invalid Credentials. Please try again.",
  icon: "error",
  button: "Okay",
})
    }else{
$.ajax({
    url:"../backend/resetpasswordconfirm.php",
    method:"POST",
    processData:false,
    contentType: false,
    data:new FormData(this),
    success: function(data){
        $("#spinner").addClass("d-none");
        if(data =="1"){
            swal({
  title: "Success!",
  text: "Password reset successfully.",
  icon: "success",
  button: "Okay",
}).then(()=>{
        window.location.assign("/merohostel/frontend/login.php");
    });
        }else{
            swal({
  title: "Error!",
  text: data,
  icon: "error",
  button: "Okay",
}).then(()=>{
        window.location.assign("/merohostel/frontend/login.php");
    });
        }
    }
})
    }
    })
</script>