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
		         <form action=\"../modules/logout.php\" method=\"post\">". $_SESSION['userName'] . "
				 <br>
				 <button type=\"submit\"> Log out</button>
				 </form>
		         </div><!--login-->"); 
           }
		  ?>
<div class="about"> 
 <form id="about-form" class="styled-form" action="ThankYouPage.php" method="post" accept-charset="utf-8">
    <div style="display:none"><input type="hidden" name="csrfmiddlewaretoken" value="8ece95d139633656ad0371bf53c45b2d" /></div>    
    <h1 class="pagetitle">About us</h1>

    <h2>Introduce</h2>
    <p>QUT Music School is a small Brisbane based music school offering private music lessons for a range of instruments. <br>
		If you are looking for a singing teacher, a piano teacher, a guitar teacher, a violin teacher, a viola teacher, a cello teacher, a saxophone teacher, a clarinet teacher etc, then you have come to the right place.</p>
  
  <div id="menu1">
    <h2>History</h2>
    <p>since 1990</p>
  </div>

	
	
	
	
	
	
	
	
    <div class="note">
      <p> </p>
    </div>
</div> 
   