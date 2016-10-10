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
if(@$_POST['instruments']){
  $selectLesson = $_POST['instruments'];
  //session_start();
  $_SESSION['instruementID']= $selectLesson;
}
 ?>

<?php

$sql="SELECT 	instruementID,instruementName FROM instruement";
$result=$conn->query($sql);
?>

<form action=<?php echo $_SERVER['SCRIPT_NAME']; ?> method="post">
  Choose a instrument that you want to hire :
    <select name="instruments";>
  <?php
  $i=1;
   while($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
      <option <?php
      if(@$_POST['$instruments']== 2){?>
        selected<?php
        $i=$i+1;?>
      <?php
      } ?>
      value=<?php echo $row['instruementID'];?>><?php echo $row['instruementName'];?></option>
    <?php
    }
    ?>
  </select>
      <input type='submit' value="Click">
</form><br><br>


<?php
@$instruementID=$_SESSION['instruementID'];
$sql2="SELECT lessonID,lessonType FROM lessons WHERE instruementID='$instruementID'";
$result2=$conn->query($sql2);
?>


<?php
@$selectClass=$_SESSION['selectClass'];
$sql3="SELECT * FROM lessons WHERE lessonID='$selectClass'";
$result3=$conn->query($sql3);
$row3=$result3->fetch();
?>
<br><br>


<?php
$userName=$_SESSION['userName'];
$sql6 = "SELECT students.studentID FROM students,logins WHERE students.loginID=logins.loginID AND logins.userName='$userName'";
$result6=$conn->query($sql6);
$row6=$result6->fetch();
$row6['studentID'];
//$result6->rowCount();
 ?>

<?php
if(@$_POST['classChoice']){ ?>
<?php
$startDate=$row3['startDate'];
$endDate=$row3['endDate'];
$lessonID=$row3['lessonID'];
$studentID=$row6['studentID'];//$_SESSION['userName'];
$sql5 = "INSERT INTO contracts(studentID,startDate,endDate,lessonID) VALUES ('$studentID','$startDate','$endDate','$lessonID')";
$result5=$conn->query($sql5);
}
?>





</div><!--adminPage-->

		  
		  
		  
		  