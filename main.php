<?php
include "pages/headerIndex.php";
?>

<style>
 body{
  background-color: #faf8fe;  <!-- background color of the main page -->
  color: #04010a; <!-- color of writing of the main page -->
  }
 
  .container {
      padding: 80px 120px;
  }
  
  .person { <!-- circle of the three photos in main pages -->
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 100%;
      height: 100%;
      opacity: 0.9;
  }
  
  .person:hover {
      border-color: #200850;
  }
  
  .bg-1 {
    background: #2d2d30;
    color: #8b4513;
  }
  
 <!-- we can find the color code here  http://www.colorhexa.com/ -->
</style>

<body>
<br>
<br>
<br>



<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="../music_school/images/main_slide1.jpg" style="margin-left:auto; margin-right:auto; width="800" height="300" alt="a" >
        <div class="carousel-caption">
          <h3>QUT</h3>
          <p>Music School!.</p>
        </div>
      </div>

      <div class="item">
        <img src="../music_school/images/main_slide2.jpg" style="margin-left:auto; margin-right:auto; width="800" height="300" alt="b" >
        <div class="carousel-caption">
          <h3>Group 63!</h3>
          <p>IFB299</p>
        </div>
      </div>

      <div class="item">
        <img src="../music_school/images/main_slide3.jpg" style="margin-left:auto; margin-right:auto; width="800" height="300" alt="c" >
        <div class="carousel-caption">
          <h3>Let's join!</h3>
          <p>Now it's promotion</p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>






<div class="container text-center">
	<h3>QUT Music School</h3>
  <p><em>IFB299</em></p>
  <p>Now join our QUT music school</p>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p><strong>Learn Fast</strong></p><br>
      <img src="../music_school/images/student3.jpg" class="img-circle person" width="255" height="255" alt="Random Name">
    </div>
    <div class="col-sm-4">
      <p><strong>Broad instruments</strong></p><br>
	 <img src="../music_school/images/student1.jpg" class="img-circle person" width="255" height="255" alt="Random Name">
     </div>
    <div class="col-sm-4">
      <p><strong>Great Teachers</strong></p><br>
 <img src="../music_school/images/teacher1.jpg" class="img-circle person" width="255" height="255" alt="Random Name">
    </div>
  </div>
</div>





<!-- Container (TOUR Section) -->
<div id="newsfeed" class="bg-1">
  <div class="container">
    <h3 class="text-center">Semester</h3>
    <p class="text-center">QUT music lesson.<br> Please apply lesson ASAP!</p>
<ul class="list-group">
  <li class="list-group-item">Guitar <span class="label label-danger">Finished!</span></li>
  <li class="list-group-item">Triangle <span class="label label-danger">Finished!</span></li> 
  <li class="list-group-item">Drum <span class="badge">3</span></li> 
</ul>
    </ul>
  </div>
</div>



</body>
<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip();
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

</html>