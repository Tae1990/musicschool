<div class="adminPage">
<?php	

	try{
		$stmt = $conn->prepare("SELECT contracts.studentContractID, contracts.studentStartDate, contracts.studentEndDate, 
		                        contracts.studentContractPermission, students.firstName from contracts, students, teachers, lessons
								where contracts.lessonID = lessons.lessonID and lessons.teacherID = teachers.teacherID and 
								   contracts.studentID = students.studentID");
		$stmt->execute();
		echo("<table padding:8px width=80% border=0 align='center'>");
		echo("<tr><th>ContractID</th><th>Start Date</th><th>End Date</th><th>Student Name</th><th>Permission</th></tr>");
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	    {
		  $studentContractID = $row["studentContractID"];
		  $studentStartDate = $row["studentStartDate"];
		  $studentEndDate = $row["studentEndDate"];
		  $studentContractPermission = $row["studentContractPermission"];
		  $sFirstName = $row["firstName"];
		  //$tfirstName = $row["firstName"];
		 
		 
		  
		  echo("<tr><td>$studentContractID</td><td>$studentStartDate</td><td>$studentEndDate</td>
		        <td class='textRight'>$sFirstName</td><td align='center'>");
		  echo("<form name=studentContractPermission method=post action=\"../modules/studentContractPermission.php\">
		        <input type=hidden name= 'autoID' value=".$row['studentContractID']." />");
			if ($row['studentContractPermission']=='off'){echo "<input type=checkbox onclick='this.form.submit();' name='studentContractPermission' value='on' />";}
			else if ($row['studentContractPermission']=='on'){echo "<input type=checkbox checked onclick='this.form.submit();' name='studentContractPermission' value='on' />";}
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