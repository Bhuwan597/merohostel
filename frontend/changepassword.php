
<?php require("_links.php");
?>
<?php
session_start();
if(!isset($_SESSION['email']) && !isset($_SESSION['phone'])){
    header("location: login.php");
    exit();
}
?>
<?php
if(isset($_SESSION['email']) && isset($_SESSION['phone'])){
    $email= $_SESSION['email'];
    $phone= $_SESSION['phone'];
    $sql = "SELECT * FROM `merohostel_users` WHERE  `email`='$email' AND `phone`='$phone';";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) ===0) {
        session_destroy();
        session_unset();
        setcookie('phone',"", time() - 3600 ,'/');
        setcookie('email',"", time() - 3600 ,'/');
    }
}

?>
<div class="container-fluid p-4">

    <form id="changepassword" class="form-signin needs-validation">
        <div class="card shadow-sm">
            <div class="card-body">

                <div class="form-outline mb-4">
                    <label class="form-label" for="currentpassword">Current Password<span class="text-danger ,e-2">*</span></label>
                    <input name="currentpassword" type="password" id="currentpassword" class="form-control form-control-lg"
                        autocomplete="off" required />
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="newpassword">New Password<span class="text-danger ,e-2">*</span></label>
                    <input name="newpassword" type="password" id="newpassword" class="form-control form-control-lg" required
                        autocomplete="off"
                        oninput="checkpassword(document.getElementById('newpassword').value, document.getElementById('confirmnewpassword').value)" />
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="confirmnewpassword">Confirm New Password<span
                            class="text-danger ,e-2">*</span></label>
                    <input name="confirmnewpassword" type="password" id="confirmnewpassword"
                        oninput="checkpassword(document.getElementById('newpassword').value, document.getElementById('confirmnewpassword').value)"
                        class="form-control form-control-lg" required autocomplete="off" />
                    <label id="passwordvalidation"></label>
                </div>
                <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
                <input type="hidden" name="phone" value="<?php echo $_SESSION['phone']; ?>">
                <input type="hidden" name="name" value="<?php echo $_SESSION['name']; ?>">

                <button id="submitBtn" class="btn btn-md btn-primary btn-block" type="submit">
                    <div id="spinner" class="spinner-border spinner-border-sm d-none me-3" role="status">
                        <span class="visually-hidden"></span>
                    </div>Reset
                </button>

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
    $("#changepassword").submit(function(e){
    e.preventDefault();
    $("#spinner").removeClass("d-none");
    let password = $("#newpassword").val();
   let confirmpassword = $("#confirmnewpassword").val();
    if(checkpassword(password,confirmpassword) == false){
        $("#spinner").addClass("d-none");
        swal({
  title: "Error!",
  text: "Invalid Form Details. Please try again.",
  icon: "error",
  button: "Okay",
})
    }else{
$.ajax({
    url:"../backend/_changepassword.php",
    method:"POST",
    processData:false,
    contentType: false,
    data:new FormData(this),
    success: function(data){
        $("#spinner").addClass("d-none");
        if(data =="1"){
            swal({
  title: "Success!",
  text: "Password changed successfully.",
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
        $("#changepassword").trigger("reset");
    });
        }
    }
})
    }
    })
</script>