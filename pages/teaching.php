<?php
include "../pages/headerIndex.php";
?>
<link rel="stylesheet" href="../css/style.css">
<!-- i need to put this into style.css -->
<!-- 여기서 body 백그라운드 패딩 마진으로 br을 대체해주는데, 문제는 이걸 css에 넣으면 main body와 lesson body가 겹친다 -->

<style> 
	body{
	  background-color: grey;
	  margin: 20px;
	  padding: 30px;
   }
	  
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  
  .panel-heading {
	 
      color: !important;   <!-- bootstrap에서는 비워놓으면 자동으로 채워짐 -->
      background-color: !important; 
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  

   .panel-body {
		
    width: auto; height: auto;
    max-width: 150px;
    max-height: 100px;
}


  
</style>


</style>

<body>

<!-- Container (Pricing Section) -->
<div class="container-fluid">
  <div class="text-center">
    <h2>Music</h2>
    <h4>Lesson</h4>
  </div>
      <div class="page-header">
                    <h1>Instruments</h1>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Guitar</h3>
                            </div>
                            <div class="panel-body">
                                <img src="../images/lesson/guitar.jpg" width="255" height="255" alt="Random Name">
                            </div>
                        </div>
						
						
						
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Piano</h3>
                            </div>
                            <div class="panel-body">
                                <img src="../images/lesson/Piano.png" width="255" height="255" alt="Random Name">
                            </div>
                        </div>
                    </div>
					
					
					
                    <!-- /.col-sm-4 -->
                    <div class="col-sm-4">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Drum</h3>
                            </div>
                            <div class="panel-body">
                               <img src="../images/lesson/Drum.jpg" width="255" height="255" alt="Random Name">
                            </div>
                        </div>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Keyboard</h3>
                            </div>
                            <div class="panel-body">
                                <img src="../images/lesson/Keyboard.jpg" width="255" height="255" alt="Random Name">
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-4 -->
                    <div class="col-sm-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title">Triangle</h3>
                            </div>
                            <div class="panel-body">
                                <img src="../images/lesson/Triangle.jpg" width="255" height="255" alt="Random Name">
                            </div>
                        </div>
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title">Base</h3>
                            </div>
                            <div class="panel-body">
                                <img src="../images/lesson/Bass.jpg" width="255" height="255" alt="Random Name">
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-4 -->
                 
                    <!-- /.col-sm-4 -->
                </div>

                <div class="page-header">
                    <h1>Teachers</h1>
                </div>
                <div class="well">
                    <p>We have Great Teachers in QUT music School</p>
					<p>With the nine music instruments are available to learn</p>
					<p>Teachers are all professionals and freiendly</p>
                </div>
</div>

</body>
</html>

