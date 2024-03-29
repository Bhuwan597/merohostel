<style>
    @import url(//fonts.googleapis.com/css?family=Montserrat:300,400,500);
.contact3 {
  font-family: "Montserrat", sans-serif;
  color: #8d97ad;
  font-weight: 300;
}

.contact3 h1,
.contact3 h2,
.contact3 h3,
.contact3 h4,
.contact3 h5,
.contact3 h6 {
  color: #3e4555;
}

.contact3 .font-weight-medium {
  font-weight: 500;
}

.contact3 .card-shadow {
  -webkit-box-shadow: 0px 0px 30px rgba(115, 128, 157, 0.1);
  box-shadow: 0px 0px 30px rgba(115, 128, 157, 0.1);
}

.contact3 .btn-danger-gradiant {
  background: #ff4d7e;
  background: -webkit-linear-gradient(legacy-direction(to right), #ff4d7e 0%, #ff6a5b 100%);
  background: -webkit-gradient(linear, left top, right top, from(#ff4d7e), to(#ff6a5b));
  background: -webkit-linear-gradient(left, #ff4d7e 0%, #ff6a5b 100%);
  background: -o-linear-gradient(left, #ff4d7e 0%, #ff6a5b 100%);
  background: linear-gradient(to right, #ff4d7e 0%, #ff6a5b 100%);
}

.contact3 .btn-danger-gradiant:hover {
  background: #ff6a5b;
  background: -webkit-linear-gradient(legacy-direction(to right), #ff6a5b 0%, #ff4d7e 100%);
  background: -webkit-gradient(linear, left top, right top, from(#ff6a5b), to(#ff4d7e));
  background: -webkit-linear-gradient(left, #ff6a5b 0%, #ff4d7e 100%);
  background: -o-linear-gradient(left, #ff6a5b 0%, #ff4d7e 100%);
  background: linear-gradient(to right, #ff6a5b 0%, #ff4d7e 100%);
}
</style>
<div class="contact3 p-5">
  <div class="row no-gutters">
    <div class="container">
      <div class="row">
        <div class="col-lg-6" style="overflow-x:hidden">
          <div class="card-shadow">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.0171850151637!2d85.32653311458266!3d27.685863733043643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19651135ce3f%3A0x5ea64ef266a14062!2sMero%20Boys%20Hostel!5e0!3m2!1sen!2snp!4v1672074905535!5m2!1sen!2snp" width="600" height="450" style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-box ml-3">
            <h1 class="font-weight-light mt-2">Send Us a Message</h1>
            <form id="contactus" class="mt-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group mt-2">
                    <?php if(isset($_SESSION['email'])){
                      echo'<input id="name" name="name" class="form-control" value="'.$_SESSION['name'].'" type="text" placeholder="name" readonly>';
                    }else{
                      echo'  <input id="name" name="name" class="form-control" value="" type="text" placeholder="Name">';
                    }
                    ?>
                  
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group mt-2">
                  <?php if(isset($_SESSION['email'])){
                      echo'<input id="email" name="email" class="form-control" value="'.$_SESSION['email'].'" type="email" placeholder="Email address" readonly>';
                    }else{
                      echo'<input id="email" name="email" class="form-control" value="" type="email" placeholder="email address">';
                    }
                    ?>

    
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group mt-2">

                  <?php if(isset($_SESSION['email'])){
                      echo'    <input id="phone" name="phone" class="form-control" value="'.$_SESSION['phone'].'" type="number" placeholder="phone" readonly>';
                    }else{
                      echo'  <input id="phone" name="phone" class="form-control" value="" type="number" placeholder="phone">';
                    }
                    ?>
                  
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group mt-2">
                    <textarea id="message" name="message" class="form-control" rows="3" placeholder="Message"></textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <button type="submit"  class="btn btn-danger-gradiant mt-3 text-white border-0 px-3 py-2"><span> SUBMIT</span></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="card mt-4 border-0 mb-4">
            <div class="row">
              <div class="col-lg-4 col-md-4">
                <div class="card-body d-flex align-items-center c-detail pl-0">
                  <div class="mr-3 align-self-center">
                    <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/contact/icon1.png">
                  </div>
                  <div class="">
                    <h6 class="font-weight-medium">Address</h6>
                    <p class="">New Baneshwor Kathmandu.
                      <br> Nepal</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="card-body d-flex align-items-center c-detail">
                  <div class="mr-3 align-self-center">
                    <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/contact/icon2.png">
                  </div>
                  <div class="">
                    <h6 class="font-weight-medium">Phone</h6>
                    <p class="">98XXXXXXXX
                      <br> +01 XXXXXXX</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="card-body d-flex align-items-center c-detail">
                  <div class="mr-3 align-self-center">
                    <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/contact/icon3.png">
                  </div>
                  <div class="">
                    <h6 class="font-weight-medium">Email</h6>
                    <p class="">
                      mero@hostel.com
                      <br> merohostel@gmail.com
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $("#contactus").submit(function(e){
    e.preventDefault();
    var form = $('#contactus')[0];
    $.ajax({
      url:"../backend/contactus.php",
      method:"POST",
      enctype: "multipart/form-data",
      processData: false,
        contentType: false,
      data: new FormData(form),
      success: function(data){
        if(data =="1"){
            swal({
  title: "Message Sent!",
  text: "We will reach up to you soon.",
  icon: "success",
  button: "Okay",
}).then(()=>{
        $("#contactus").trigger("reset");
    });
        }else{
            swal({
  title: "Error!",
  text: data,
  icon: "error",
  button: "Okay",
}).then(()=>{
  $("#contactus").trigger("reset");
    });
        }
      }
    })
  })
</script>