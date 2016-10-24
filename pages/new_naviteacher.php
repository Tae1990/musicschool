<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>QUT Music School</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
   

    <!-- Custom Fonts -->
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">

                <a class="navbar-brand" href="../index.php">QUT Music school</a>
            </div>
            
                

            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">  <!--이부분에서 프로필 설정하겠끔 -->

               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
       
<?php 
 if (!isset($_SESSION['login']) and !isset($_SESSION['error']))
 {       
	echo(
          "<div class=\"login\">
           <form action=\"../modules/login.php\" method=\"post\">
           <div class=\"form-group\">
           <label for=\"userName\">User name</label>
           <input type=\"text\" id=\"userName\" name=\"userName\" placeholder=\"Enter userName\" required>
           </div>
           <div class=\"form-group\">
           <label for=\"password\">Password</label>
           <input type=\"password\" id=\"password\" name=\"password\" placeholder=\"Enter password\">
           </div>
           <button type=\"submit\"> Login</button>
           </form>
           <form action=\"register_student.php\">
           <input type=\"submit\" value=\"Register as student\">
           </form>
		   <form action=\"register_teacher.php\">
           <input type=\"submit\" value=\"Register as teacher\">
           </form>
		   
		  
		  </div><!--login-->");
 }
 elseif ( isset($_SESSION['error']) )
 {
	 
	
	 echo("<div class=\"login\">
           <form action=\"../modules/login.php\" method=\"post\">
           <div class=\"form-group\">
           <label for=\"userName\">User name</label>
           <input type=\"text\" id=\"userName\" name=\"userName\" placeholder=\"Enter userName\" required>
            </div>
            <div class=\"form-group\">
              <label for=\"password\">Password</label>
              <input type=\"password\" id=\"password\" name=\"password\" placeholder=\"Enter password\">
            </div>
              <button type=\"submit\"> Login</button>
              </form>
              <form action=\"register_student.php\">
           <input type=\"submit\" value=\"Register as student\">
           </form>
		   <form action=\"register_teacher.php\">
           <input type=\"submit\" value=\"Register as teacher\">
           </form>
			  ".$_SESSION['error']."
			</div><!--login-->");	
			
			
	unset($_SESSION['error']);		  
 }
else
{
	echo ("<div class=\"login\">
				 hello :)
		         <form action=\"../modules/logout.php\" method=\"post\">". $_SESSION['userName'] . "
				 <br>
				 
			
				 </form>
		         </div><!--login-->"); 
           }
?>	   
 <b class="caret"></b></a>
				  <ul class="dropdown-menu">
                        <li>
                            <a href="teacherPage.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="../modules/logout.php"> <i class="fa fa-fw fa-power-off"></i> Log Out</a> 
                        </li>
                    </ul>
                </li>
				
				
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        
                    </li>
                   
                    <li>
                        <a href="teacherInstrument.php"><i class="fa fa-fw fa-table"></i> Instruments </a>
                    </li>
                    <li>
                        <a href="teacherInstrumentHire.php"><i class="fa fa-fw fa-edit"></i> Hired Instruments </a>
                    </li>
					<li>
                        <a href="contractteacherINFO.php"><i class="fa fa-fw fa-edit"></i> Contract Info </a>
                    </li>
					<li>
                        <a href="teacherSchedule.php"><i class="fa fa-fw fa-edit"></i> Schedule </a>
                    </li>
					
<!--				
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
-->
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
<!--여기서부터 -->

    </div>
    <!-- /#wrapper -->
	
	<!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>


</body>

</html>