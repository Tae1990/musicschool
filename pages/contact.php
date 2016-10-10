<?php
include "../pages/headerIndex.php";
?>
<link rel="stylesheet" href="../css/style.css">

 <body>
 <br>
 <br>
 <br>


<div class="container">
  <h3 class="text-center">Contact</h3>
  <p class="text-center"><em>Any enquries to Owner</em></p>
  <div class="row test">
    <div class="col-md-4">
      <p>Hello this is QUT music School.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Gardens point, Brisbane</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: +61 7 1234 5678</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: qutmusicschool@qut.edu.au</p> 
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
      </div> 
    </div>
  </div>
</div>

 </body>