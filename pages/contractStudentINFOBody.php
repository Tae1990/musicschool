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
<div class="adminPage">
<?php
try{
	//prepare query
	$stmt = $conn->prepare("SELECT lessons.lessonType, lessons.instrument, lessons.lessionDuration, lessons.lessonPlace, contracts.startDate, contracts.endDate, 
	    teachers.firstName from contracts, lessons, teachers, students, logins where contracts.lessonID = lessons.lessonID and lessons.teacherID = 
		teachers.teacherID and contracts.studentID = students.studentID and students.loginID = logins.loginID and $_SESSION['userName'] = students.studentID ");
		//execute
		$stmt->execute();
		// retrieve all rows
		echo ("<table class=\"table\">");
		echo ("<tr><th> Lesson Type</th><th>Instrument</th><th>Lesson Duration</th><th>Lesson Place</th><th>Start Date</th><th>End Date</th><th>Teacher Name</th></tr>");

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$lessonType = $row["lessonType"];
			$instrument = $row["instrument"];
			$lessionDuration = $row["lessionDuration"];
			$lessonPlace = $row["lessonPlace"];
			$startDate = $row["startDate"];
			$endDate = $row["endDate"];
			$firstName = $row["firstName"];
			echo("<tr><td>$lessonType</td><td>$instrument</td><td>$lessionDuration</td>");
			echo("<td>$lessonPlace</td><td>$startDate</td><td>$endDate</td><td>$firstName</td></tr>");
			echo ("</table>");
		}	
}
catch(PDOExceptio $e)
{
echo "Error: " . $e->getMessage();
}
?>
</div><!--adminPage-->