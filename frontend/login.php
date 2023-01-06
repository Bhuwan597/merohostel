<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<body class="bg-secondary p-4">
    <div class="row d-flex justify-content-center align-items-center h-50">
      <div class="col-6 col-md-10 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 ">
<form id="loginform">

    <h3 class="mb-5 text-center">Log in</h3>
    
    <div class="form-outline mb-4">
        <label class="form-label" for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control form-control-lg" required/>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="phone">Phone</label>
                <input type="number" name="phone" id="phone" class="form-control form-control-lg" required/>
            </div>
            
            <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control form-control-lg" required/>
            </div>
            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div>
            <div class="container text-center">Forgot Password? <a href="#">Reset</a></div>
            <hr class="my-2">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            <hr class="my-2">
            <div class="container text-center">Don't have an account <a href="signup.php">Signup</a></div>     
        </form>
          </div>
        </div>
      </div>
    </div>
      
</body>
<script>
  $("#loginform").submit(function(e){
    e.preventDefault();
    $.ajax({
      url: "../backend/_login.php",
        method: "POST",
        processData:false,
        contentType: false,
        data:new FormData(this),
        success: function (data){
          if(data =="1"){
            swal({
  title: "Success!",
  text: "You are loogged in now.",
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
  })
</script>