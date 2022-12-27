<style>
.container {
    margin-top: 100px;
}

.counter-box {
    display: block;
    background: #f6f6f6;
    padding: 40px 20px 37px;
    text-align: center
}

.counter-box p {
    margin: 5px 0 0;
    padding: 0;
    color: #909090;
    font-size: 18px;
    font-weight: 500
}

.counter-box i {
    font-size: 60px;
    margin: 0 0 15px;
    color: #d2d2d2
}

.counter {
    display: block;
    font-size: 32px;
    font-weight: 700;
    color: #666;
    line-height: 28px
}

.counter-box.colored {
    background: #3acf87;
}

.counter-box.colored p,
.counter-box.colored i,
.counter-box.colored .counter {
    color: #fff
}
</style>
<div class="bg-dark text-secondary px-4 py-5 text-center">
    <div class="py-5">
        <h1 class="display-5 fw-bold text-white">Mero Hostel <br>Boys Residency</h1>
        <div class="col-lg-6 mx-auto">
            <p class="fs-5 mb-4">We provide accomodation facility to the students and job person in Kathmandu, New Baneshwar Buddhanagar. Best facilites and services is being provided since 2010 AD.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Admission</button>
                <button type="button" class="btn btn-outline-light btn-lg px-4">Read about us</button>
            </div>
        </div>
        <?php
$sql = "SELECT * FROM merohostel_records";
$result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)){
    echo' <div class="container">

    <div class="row">

        <div class="four col-md-3">
            <div class="counter-box colored">
                <i class="fa fa-thumbs-o-up"></i>
                <span class="counter">'.$row['happystudents'].'</span>
                <p>Happy Students</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fa fa-group"></i>
                <span class="counter">'.$row['registeredmembers'].'</span>
                <p>Registered Members</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fa  fa-shopping-cart"></i>
                <span class="counter">'.$row['availablehostelstudents'].'</span>
                <p>Available Hostel Students</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fa  fa-user"></i>
                <span class="counter">'.$row['admissions'].'</span>
                <p>Admissions</p>
            </div>
        </div>
    </div>
</div>';  
   }
  ?>
       
    </div>
</div>
<script>
$(document).ready(function() {
    $('.counter').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

});
</script>