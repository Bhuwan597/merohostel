<?php require("_links.php");?>
<style>
    body {
  font-family: 'Karla', sans-serif; }

.pricing-table-header {
  background-color: #0e091b;
  color: #fff;
  padding-top: 10px;
  padding-bottom: 50px; }

.pricing-table-title {
  font-weight: bold;
  margin-bottom: 30px; }

.pricing-plans-tab {
  -webkit-box-pack: center;
          justify-content: center; }
  .pricing-plans-tab .list-group-item-action {
    width: auto;
    border: solid 1px #fff;
    background-color: #fff;
    color: #082357;
    font-size: 14px; }
    .pricing-plans-tab .list-group-item-action.active {
      background-color: #0f3783;
      color: #fff; }

.pricing-tab-content {
  margin-top: -60px; }
  .pricing-tab-content .tab-pane.active {
    -webkit-animation: slide-down 0.6s ease-in-out;
            animation: slide-down 0.6s ease-in-out; }

@-webkit-keyframes slide-down {
  0% {
    opacity: 0;
    -webkit-transform: translateY(5%);
            transform: translateY(5%); }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
            transform: translateY(0); } }

@keyframes slide-down {
  0% {
    opacity: 0;
    -webkit-transform: translateY(5%);
            transform: translateY(5%); }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
            transform: translateY(0); } }

.pricing-card {
  border: none;
  border-radius: 4px;
  margin-bottom: 28px;
  -webkit-transition: all 0.6s;
  transition: all 0.6s; }
  .pricing-card .card-header {
    background-color: #100a44;
    color: #fff;
    padding-top: 40px;
    padding-bottom: 36px; }
  .pricing-card .card-body {
    padding: 22px 35px 27px; }

.pricing-plan-title {
  font-size: 20px;
  color: inherit;
  margin-bottom: 0;
  font-weight: normal; }

.pricing-plan-cost {
  font-size: 28px;
  font-weight: bold; }

.pricing-plan-features {
  list-style: none;
  padding-left: 0;
  color: #303132;
  font-size: 14px;
  line-height: 2.86;
  margin-bottom: 16px; }
  .pricing-plan-features li {
    border-bottom: 1px solid #e3e3e3; }
    .pricing-plan-features li:last-child {
      border-bottom: none; }

.pricing-plan-purchase-btn {
  color: #fff;
  background-color: #22c091;
  border-color: #22c091;
  font-size: 14px;
  font-weight: bold;
  padding: 13px 20px;
  border-radius: 6px;
  -webkit-transition: all 0.4s;
  transition: all 0.4s;
  position: relative; }
  .pricing-plan-purchase-btn:hover {
    border: 1px solid #22c091;
    background-color: #fff;
    color: #22c091; }

/*# sourceMappingURL=pricing-plan.css.map */
</style>
<header class="pricing-table-header">
      <div class="container">
        <h5 class="text-center">MERO HOSTEL</h5>
        <h1 class="text-center pricing-table-title">Monthly Fee Plans</h1>
          <div class="list-group list-group-horizontal pricing-plans-tab" role="tablist">
              <a class="list-group-item list-group-item-action" id="monthly-plans-tab" data-toggle="list" href="#monthly-plans" role="tab" aria-controls="monthly-plans" aria-selected="false">Check out plans</a>
          </div>

      </div>
    </header>
    <div class="container">
        <?php
        $sql = "SELECT * FROM merohostel_pricing";
$result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)){
    echo'<div class="tab-content pricing-tab-content" id="pills-tabContent">
    <div class="tab-pane show active" id="monthly-plans" role="tabpanel" aria-labelledby="monthly-plans-tab">
      <div class="row">
        <div class="col-md-4">
          <div class="card pricing-card text-center shadow border-0">
            <div class="card-header">
              <h5 class="pricing-plan-title">One Sitter</h5>
              <h3 class="pricing-plan-cost">'.$row['onesitterprice'].'/Month</h3>
            </div>
            <div class="card-body">
              <ul class="pricing-plan-features">
                <li>Annual Plan fee</li>
                <li>Monthly plan fee</li>
                <li>Seat Minimum</li>
                <li>Phone support</li>
                <li>Group messaging</li>
                <li>Chat</li>
              </ul>
              <a href="#!" class="btn btn-success pricing-plan-purchase-btn">Choose Plan</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card pricing-card text-center shadow border-0">
            <div class="card-header">
              <h5 class="pricing-plan-title">Two Sitter</h5>
              <h3 class="pricing-plan-cost">'.$row['twositterprice'].'/Month</h3>
            </div>
            <div class="card-body">
              <ul class="pricing-plan-features">
                <li>Annual Plan fee</li>
                <li>Monthly plan fee</li>
                <li>Seat Minimum</li>
                <li>Phone support</li>
                <li>Group messaging</li>
                <li>Chat</li>
              </ul>
              <a href="#!" class="btn btn-success pricing-plan-purchase-btn">Choose Plan</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card pricing-card text-center shadow border-0">
            <div class="card-header">
              <h5 class="pricing-plan-title">Three Sitter</h5>
              <h3 class="pricing-plan-cost">'.$row['threesitterprice'].'/Month</h3>
            </div>
            <div class="card-body">
              <ul class="pricing-plan-features">
                <li>Annual Plan fee</li>
                <li>Monthly plan fee</li>
                <li>Seat Minimum</li>
                <li>Phone support</li>
                <li>Group messaging</li>
                <li>Chat</li>
              </ul>
              <a href="#!" class="btn btn-success pricing-plan-purchase-btn">Choose Plan</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>';
   }
   ?>
      
    </div>