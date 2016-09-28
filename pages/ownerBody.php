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
		$stmt = $conn->prepare("SELECT loginID, role, permission, userName from logins");
		$stmt->execute();
		echo("<table padding:8px width=80% border=0 align='center'>");
		echo("<tr><th>Login ID</th><th>Role</th><th>User Name</th><th>Permission</th></tr>");
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	  {
		  $userID = $row["loginID"];
		  $role = $row["role"];
		  $permission = $row["permission"];
		  $userName = $row["userName"];
		 
		  
		  echo("<tr><td>$userID</td><td>$role</td>
		        <td class='textRight'>$userName</td><td align='center'>");
		  echo("<form name=permission method=post action=\"../modules/permission.php\">
		        <input type=hidden name= 'autoID' value=".$row['loginID']." />");
			if ($row['permission']=='off'){echo "<input type=checkbox onclick='this.form.submit();' name='permission' value='on' />";}
			else if ($row['permission']=='on'){echo "<input type=checkbox checked onclick='this.form.submit();' name='permission' value='on' />";}
			/* else {echo "<input type=checkbox onclick='this.form.submit();' name='permission' value='on' />";} */
			echo("<input type='hidden' name='action' value='check'></form></p></td></tr>");		
	  }
	echo("</table>");
    }
	catch(PDOExceptio $e)
	{
			echo "Error: " . $e->getMessage();
	}
?>
</div><!--ownerPage-->