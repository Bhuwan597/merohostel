<?php require("_links.php"); session_start();?>
<?php require("../backend/dbconfig.php"); ?>
<?php
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
<div class="container m-4">
    <h1 class="h1">Your Admissions</h1>
    <?php
$email=$_SESSION['email'];
$phone=$_SESSION['phone'];
$sql = "SELECT * FROM `merohostel_admissions` WHERE `email`='$email' AND `phone`='$phone';";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        echo'<div class="card my-4">
        <div class="card-body text-primary h4">
         Duration: '.$row['duration'].' Months <br>
         sitter: '.$row['sitter'].' Sitter
        </div>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        '.$row['status'].' 
        </span>
      </div>';
    }
   
}else{
    echo "No admissions yet";
}
?>


</div>
<div class="container-fluid p-4">

    <form id="admissionform" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <label class="input-group-text" for="sitter">Options</label>
            <select class="form-select" id="sitter" name="sitter" required>
                <option value="" selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <label class="form-label" for="duration">Duration</label>
        <div class="range">
            <input type="range" value="1" class="form-range" name="duration" id="duration" min="1" max="48"
                oninput="sliderChange(this.value)" required />
            <output class="p-2 text-success" id="sliderVal">1 Month</output>
        </div>
        <input type="hidden" name="name" id="name" value="<?php echo $_SESSION['name'];  ?>">
        <input type="hidden" name="email" id="email" value="<?php echo $_SESSION['email'];  ?>">
        <input type="hidden" name="phone" id="phone" value="<?php echo $_SESSION['phone'];  ?>">
        <input type="hidden" name="profilephoto" id="profilephoto" value="<?php echo $_SESSION['profilephoto'];  ?>">
        <input type="hidden" name="address" id="address" value="<?php echo $_SESSION['address'];  ?>">
        <button type="submit" class="btn btn-primary"><div id="spinner" class="spinner-border spinner-border-sm d-none
            me-3" role="status">
            <span class="visually-hidden"></span>
</div>Submit</button>
</form>
</div>
<script>
function sliderChange(val) {
    document.getElementById('sliderVal').innerHTML = val + ' Months';
}
</script>
<script>
$("#admissionform").submit(function(e) {
    $("#spinner").removeClass("d-none");
    e.preventDefault();
    $.ajax({
        url: "../backend/submitadmissionform.php",
        method: "POST",
        contentType: false,
        processData: false,
        data: new FormData(this),
        success: function(data) {
            $("#spinner").addClass("d-none");
            if (data == "1") {
                swal({
                    title: "Done!",
                    text: "Your Admission form has been submitted.",
                    icon: "success",
                    button: "Okay",
                }).then(() => {
                    window.location.assign("/merohostel/frontend/admissions.php");
                });
            } else {
                swal({
                    title: "Error!",
                    text: data,
                    icon: "error",
                    button: "Okay",
                });
            }
        }
    })
})
</script>