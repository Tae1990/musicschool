<?php
include "../pages/headerIndex.php";
?>
<link rel="stylesheet" href="../css/style.css">
<style>
/* Black buttons with extra padding and without rounded borders */
.btn {
    padding: 10px 20px;
    background-color: #333;
    color: #f1f1f1;
    border-radius: 0;
    transition: .2s;
}

/* On hover, the color of .btn will transition to white with black text */
.btn:hover, .btn:focus {
    border: 1px solid #333;
    background-color: #fff;
    color: #000;
	

}
</style>
 <body>
 <br>
 <br>
 <br>
 

   <div class="row text-center">
  <div class="col-sm-4">
    <div class="thumbnail">
      <img src="MusicStudent.jpg" height="300" alt="Student">
      <p><strong>Student</strong></p>
      <p>Potential Students</p>
      <button class="btn" onclick="location.href='../pages/register_student.php' ">Register</button>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="thumbnail">
      <img src="MusicTeacher.jpg" height="300" alt="Teacher">
      <p><strong>Teachers</strong></p>
      <p>Potential Teachers</p>
      <button class="btn" onclick="location.href='../pages/register_teacher.php' ">Register</button>
    </div>
  </div>

</div>


 </body>
