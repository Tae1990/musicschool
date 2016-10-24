<html>
<head>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

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

</head>

<?php
$userName=$_SESSION['userName'];
$sql = "SELECT students.studentID FROM students,logins
        WHERE students.loginID=logins.loginID AND logins.userName='$userName'";
$result=$conn->query($sql);
$row=$result->fetch();
$studentID=$row['studentID'];echo '<br>';

$sql="SELECT * FROM contracts inner join
     (select lessonID,lessonType from lessons) as newTable
     where studentID='$studentID' and newTable.lessonID=contracts.lessonID";

$result2=$conn->query($sql);
?>

<?php
while($row=$result2->fetch(PDO::FETCH_ASSOC)){
 ?>
<input type="button" name="<?php echo $row['lessonID'];?>" value="<?php echo $row['lessonType']?>" onclick="choiceClick(this.value,this.name)" id="open_same_window"/>
<?php
}
 ?>
<script>
function choiceClick(val,val2){
  var lessonType=val;
  var lessonID=val2;
  window.location='/music_school/pages/afterEnrollment.php?lessonID='+lessonID;
}
</script>
