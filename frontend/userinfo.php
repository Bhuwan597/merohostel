<?php require("_links.php"); session_start();?>
<?php require("../backend/dbconfig.php"); ?>
<?php
if(!isset($_SESSION['email']) && !isset($_SESSION['phone'])){
    header("location: login.php");
    exit();
}
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<body class="bg-secondary p-4">
    <div class="row d-flex justify-content-center align-items-center h-50">
        <div class="col-6 col-md-10 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 ">
                    <form id="updateinfoform" enctype="multipart/form-data">

                        <h3 class="mb-5 text-center">Your Info</h3>
                        <div class="d-flex justify-content-center align-center" id="imagePreview">
                        <img style="width: 200; height: 200; border-radius: 120px;" src="<?php echo "../images/".$_SESSION['profilephoto']; ?>"/>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="name">Full Name<span class="text-danger ,e-2">*</span></label>
                            <input name="name" value="<?php echo $_SESSION['name'];
?>" type="text" id="name" class="form-control form-control-lg" required autocomplete="off"/>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email<span class="text-danger ,e-2">*</span></label>
                            <input name="email" value="<?php echo $_SESSION['email'];
?>" type="email" id="email" class="form-control form-control-lg" required autocomplete="off" readonly/>
                            <label id="emailvalidation"></label>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="phone">Phone<span class="text-danger ,e-2">*</span></label>
                            <input name="phone" value="<?php echo $_SESSION['phone'];
?>" type="number" id="phone" class="form-control form-control-lg" required autocomplete="off" readonly/>
                            <label id="phonevalidation"></label>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="dateofbirth">Date of Birth<span class="text-danger ,e-2">*</span></label>
                            <input value="<?php echo $_SESSION['dateofbirth'];
?>" name="dateofbirth" type="date" id="dateofbirth" class="form-control form-control-lg" required autocomplete="off"/>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="address">Address<span class="text-danger ,e-2">*</span></label>
                            <input name="address" value="<?php echo $_SESSION['address'];
?>" type="text" id="address" class="form-control form-control-lg" required autocomplete="off"/>
                        </div>
                        <label class="form-label" for="profilephoto">Profile Photo<span class="text-danger ,e-2">*</span></label>
                        <div class="input-group mb-3">

                            <input onchange="return checkAndFilterFiles()" type="file" class="form-control"
                                id="profilephoto" name="profilephoto" required autocomplete="off">
                            <label class="text-warning my-1" id="photovalidation">Please upload the photo having
                                extensions .png .gif .jpeg .jpg of atmost 1mb.</label>
                        </div>
                        <hr class="my-2">
                        <button id="updatesubmit" class="btn btn-primary btn-lg btn-block" type="submit"><div id="spinner" class="spinner-grow spinner-grow-sm mx-4 d-none" role="status">
                            <span class="visually-hidden"></span>
                          </div>Update Info</button>
                     
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    function checkAndFilterFiles() {
        var userFileImg = document.getElementById('profilephoto');
        var destOrignalFile = userFileImg.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if (!allowedExtensions.exec(destOrignalFile)) {
            document.getElementById("photovalidation").innerHTML = '<label class="text-danger d-block">Please you can upload file having extensions .jpeg/.jpg/.png/.gif only.</label>';
            userFileImg.value = '';
            return false;
        } else {
            // Image displaying
            if(userFileImg.files[0].size > 1000000){
                document.getElementById("photovalidation").innerHTML = '<label class="text-danger d-block">Photo size exceeds. Please re upload having atmost size 1mb.</label>';
            userFileImg.value = '';
            }else{
            if (userFileImg.files && userFileImg.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('imagePreview').innerHTML = '<img style="width: 200; height: 200; border-radius: 120px;" src="' + e.target.result + '"/>';
                    document.getElementById("photovalidation").innerHTML = '<label class="text-success d-block" >Uploaded.</label>';
                }
                reader.readAsDataURL(userFileImg.files[0]);

            }
            };
        }
    }
</script>
<script>
    $("#updateinfoform").submit(function(e){
        e.preventDefault();
        $("#spinner").removeClass("d-none");
        document.getElementById("updatesubmit").setAttribute("disabled",true);
    let name = $("#name").val();
    let email = $("#email").val();
    let phone = $("#phone").val();
    let dateofbirth = $("#dateofbirth").val();
    let address = $("#address").val();
    let profilephoto = $("#profilephoto").val();
    if(name=='' || email=="" || phone=="" || dateofbirth==""|| address==""|| profilephoto ==""){
        swal({
  title: "Error!",
  text: 'Invalid Form Details.',
  icon: "error",
  button: "Okay",
});
    }else{
      $.ajax({
        url: "../backend/_updateinfo.php",
        method: "POST",
        processData:false,
        contentType: false,
        data:new FormData(this),
        success: function (data){
            $("#spinner").addClass("d-none");
        document.getElementById("updatesubmit").removeAttribute("disabled");
            if(data =="1"){
            swal({
  title: "Success!",
  text: "Your Info Updated Successfully.",
  icon: "success",
  button: "Okay",
}).then(()=>{
        window.location.assign("/merohostel/frontend/index.php");
    });
        }else{
            swal({
  title: "Error!",
  text: data,
  icon: "error",
  button: "Okay",
});
        }
        }

      })
    }
    })
</script>