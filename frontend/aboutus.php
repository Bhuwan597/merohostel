<style>
.name {
  color: blue;
}

.work {
  font-weight: bold;
  font-size: 15px;
}

.about span {
  font-size: 13px;
}

.v-profile {
  color: blue;
  cursor: pointer;
}

.box {
  -webkit-box-shadow: 13px 12px 5px -10px rgba(196,194,196,0.72);
  -moz-box-shadow: 13px 12px 5px -10px rgba(196,194,196,0.72);
  box-shadow: 13px 12px 5px -10px rgba(196,194,196,0.72);
}

.col-md-3 {
  margin-top: 10px;
}
</style>
    <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">About Mero Hostel</h1>
          <p class="lead text-muted">We, Mero Hostel, located in Buddhanagar, New Baneshwor, Kathmandu offer a pocket friendly stay to each residents and welcome them with complete warmth and hospitality. We offer an array of all essential services that are rendered by the hostel for a hassle free stay at no extra costs. For accommodation, the property offers spacious, airy and well-lit rooms, featuring sophisticated and welcoming ambience with the warmth and comfort of home. We take utmost care of the safety and security of individuals and their belongings staying in our hostel.</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Know more about us</a>
          </p>
        </div>
      </section>
    <div class="container text-center mt-5 mb-2">
        <h1 class="mb-0">Team</h1><span>Meet the mero hostel team members.</span></div>
    <div class="container mt-3">
        <div class="row">

            <?php
            $sql = "SELECT * FROM merohostel_team";
    $result = mysqli_query($conn, $sql);
       while($row = mysqli_fetch_assoc($result)){
        echo'<div class="col-md-3">
            <div class="bg-white p-3 text-center rounded box"><img class="img-responsive rounded-circle" src="'.$row['imagelink'].'" width="90">
                <h5 class="mt-3 name">'.$row['name'].'</h5><span class="work d-block">'.$row['role'].'</span><span class="work d-block"></span>
                <div class="mt-4 about"><span>'.$row['description'].'</span></div>
                <div class="mt-4">
                    <a href="'.$row['profilelink'].'" target="_blank" class="v-profile">Go to profile</a>
                </div>
            </div>
        </div>';
       }
       ?>
         
            </div>
        </div>
        <hr>
    </div>
<br><br>