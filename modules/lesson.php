<?php
include "../pages/headerIndex.php";
?>
<link rel="stylesheet" href="../css/style.css">
<style>
 body{
  background-color: #f5f5dc;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
  }
  </style>

<body>
<br><br><br><br><br>



<!-- Container (Pricing Section) -->
<div class="container-fluid">
  <div class="text-center">
    <h2>Pricing</h2>
    <h4>Lesson Coast</h4>
  </div>
  <div class="row">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Basic</h1>
        </div>
        <div class="panel-body">
          <p><strong>10</strong> hours</p>
          <p><strong>2 times</strong> per week</p>
          <p><strong>2</strong> instruments</p>
        </div>
        <div class="panel-footer">
          <h3>$99</h3>
          <h4>per month</h4>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Pro</h1>
        </div>
        <div class="panel-body">
          <p><strong>17</strong> hours</p>
          <p><strong>3 times</strong> per week</p>
          <p><strong>3</strong> instruments</p>
        </div>
        <div class="panel-footer">
          <h3>$149</h3>
          <h4>per month</h4>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Premium</h1>
        </div>
               <div class="panel-body">
          <p><strong>20</strong> hours</p>
          <p><strong>4 times</strong> per week</p>
          <p><strong>4</strong> instruments</p>
        </div>
        <div class="panel-footer">
          <h3>$169</h3>
          <h4>per month</h4>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>

