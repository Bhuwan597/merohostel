
  <style>
.form-control {
display: block;
width: 100%;
min-height: calc(1.5em + .75rem + 2px);
padding: .575rem .75rem;
font-size: 1rem;
font-weight: 400;
line-height: 1.5;
color: #495057;
background-color: #fff;
background-clip: padding-box;
border: 1px solid #ced4da;
-webkit-appearance: none;
-moz-appearance: none;
appearance: none;
border-radius: 52px;
transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.card{

padding: 20px;
background-color: #eee;
    padding-bottom: 50px;
padding-top: 50px;

}


.form-control:focus {
color: #495057;
background-color: #fff;
border-color: #f9a826;
outline: 0;
box-shadow: none;
}


.border-rad{

border-top-right-radius: 28px;
border-bottom-right-radius: 28px;

color: #fff;
background-color: #f9a826;
border-color: #f9a826;
}




.border-rad:hover{

 background-color: #f9a826;
border-color: #f9a826;

}
  </style>
  <footer class="bg-dark text-center text-lg-start text-white">
    
    <!-- Grid container -->
    <div class="container py-4">
       
      <!--Grid row-->
      <div class="row my-4">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

          <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 150px; height: 150px;">
            <img src="https://mdbootstrap.com/img/Photos/new-templates/animal-shelter/logo.png" height="70" alt=""
                 loading="lazy" />
          </div>

          <p class="text-center">Homless animal shelter The budgetary unit of the Capital City of Warsaw</p>

          <ul class="list-unstyled d-flex flex-row justify-content-center">
            <li>
              <a class="text-white px-2" href="#!">
                <i class="fab fa-facebook-square"></i>
              </a>
            </li>
            <li>
              <a class="text-white px-2" href="#!">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li>
              <a class="text-white ps-2" href="#!">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
          </ul>

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4">Animals</h5>

          <ul class="list-unstyled">
            <li class="mb-2">
              <a href="#!" class="text-white"><i class="fa-solid fa-link pe-3"></i>Home</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-white"><i class="fa-solid fa-link pe-3"></i>About</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-white"><i class="fa-solid fa-link pe-3"></i>Blogs</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-white"><i class="fa-solid fa-link pe-3"></i>Admission</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-white"><i class="fa-solid fa-link pe-3"></i>Testimonials</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-white"><i class="fa-solid fa-link pe-3"></i>Gallery</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-white"><i class="fa-solid fa-link pe-3"></i>Location</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-white"><i class="fa-solid fa-link pe-3"></i>Pricing</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-white"><i class="fa-solid fa-link pe-3"></i>Services</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4">Actions</h5>

          <ul class="list-unstyled">
           <button class="btn btn-outline-info me-2">Login</button>
           <button class="btn btn-outline-warning me-2">Register</button>
           <li>
             <button class="btn btn-outline-primary m-2">Send Us a Message</button>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-0 mb-md-0">
          <h5 class="text-uppercase mb-4">Contact</h5>

          <ul class="list-unstyled">
            <li>
              <p><i class="fas fa-map-marker-alt pe-2"></i>Buddhanagar, New Baneshwor, Kathmandu</p>
            </li>
            <li>
              <p><i class="fas fa-phone pe-2"></i>+977 98XXXXXXXX</p>
            </li>
            <li>
              <p><i class="fas fa-envelope pe-2 mb-0"></i>mero@hostel.com</p>
            </li>
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->
    <div class="row d-flex justify-content-center align-items-center rows ">

        <div class="col-md-10">
            <div class="card bg-transparent border-0">
    
    
                <div class="text-center">
    
                    <img src="https://i.imgur.com/Dh7U4bp.png" width="100">
                   
                    <div class="mx-5">
    
    
                       <div class="input-group mb-3 mt-4">
                          <input id="subscribeemail" type="text" class="form-control" placeholder="Enter email" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                          <button onclick="subscriptions()" class="btn btn-success border-rad" type="button" id="button-addon2" id="subscribebtn">Subscribe</button>
                        </div>
                        
    
                    </div>
                    
                </div>
                
            </div>
            
        </div>
    </div>
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2020 Copyright:
      <a class="text-white" href="#">Mero Hostel</a>
    </div>
    <!-- Copyright -->
  </footer>
  <script>
   function subscriptions(){
    let subscribeemail = $("#subscribeemail").val();
    if(subscribeemail !==""){
        $.ajax({
          url: "../backend/subscriptions.php",
          method:"POST",
          data:{email:subscribeemail},
          success: function(data){ 
           if(data=="1"){
             $("#subscribeemail").val('');
              swal({
                        title: "Subscribed!",
                        text: "Your email is subscribed to mero hostel.",
                        icon: "success",
                        button: "Okay",
                    })
            }else{
              $("#subscribeemail").val('');
              swal({
                        title: "Error!",
                        text: data,
                        icon: "error",
                        button: "Okay",
                    })
            }
         
          }
        })
    }else{
      swal({
                        title: "Error!",
                        text: "Invalid Email",
                        icon: "error",
                        button: "Okay",
                    })
                    $("#subscribeemail").val('');
    }
   }
  </script>
