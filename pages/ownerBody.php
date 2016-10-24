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
			echo("<input type='hidden' name='action' value='check'></form></p></td>");	
			
			if($row['role']=='teacher'){echo("<td><a href='teachers-edit.php?loginID=" . $row['loginID'] . "'>Edit</a></td></tr>");}
			else if($row['role']=='student'){echo("<td><a href='students-edit.php?loginID=" . $row['loginID'] . "'>Edit</a></td></tr>");}	
	  }
	echo("</table>");
    }
	catch(PDOExceptio $e)
	{
			echo "Error: " . $e->getMessage();
	}
?>
</div><!--ownerPage-->