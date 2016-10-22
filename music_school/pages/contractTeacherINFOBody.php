<div class="adminPage">
<?php
    //Get loginID from userName
    $userName = $_SESSION['userName'];
	$row1=$conn->query("SELECT loginID FROM logins WHERE userName ='$userName'")->fetch();
	$loginID = $row1['loginID'];
	$nRows = $conn->query("select count(contracts.studentContractID) AS NumberOfContract from contracts
	                       INNER JOIN lessons ON contracts.lessonID = lessons.lessonID
						   INNER JOIN teachers ON lessons.teacherID = teachers.teacherID
						   INNER JOIN logins ON teachers.loginID = '$loginID'")->fetchColumn();
    if ($nRows < 1)
    {
	   echo "You don't have any contracts with students";
    }
    if ($nRows > 0){ 
		try{
			//prepare query
			$stmt = $conn->prepare("SELECT lessons.lessonType, lessons.lessonDuration, lessons.lessonPlace, 
								   contracts.studentStartDate, contracts.studentEndDate, students.firstName from contracts, lessons, teachers, students, 
								   logins where contracts.lessonID = lessons.lessonID and lessons.teacherID = teachers.teacherID and 
								   contracts.studentID = students.studentID and students.loginID = logins.loginID and '$loginID' = teachers.loginID");
				//execute
				$stmt->execute();
				// retrieve all rows
				echo ("<table padding:8px width=80% border=0 align='center'>");
				echo ("<tr><th> Lesson Type</th><th>Lesson Duration</th>
					   <th>Lesson Place</th><th>Start Date</th><th>End Date</th><th>Student Name</th></tr>");

				while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					$lessonType = $row["lessonType"];
					$lessonDuration = $row["lessonDuration"];
					$lessonPlace = $row["lessonPlace"];
					$startDate = $row["studentStartDate"];
					$endDate = $row["studentEndDate"];
					$firstName = $row["firstName"];
					
					echo("<tr><td>$lessonType</td><td>$lessonDuration</td>");
					echo("<td>$lessonPlace</td><td>$startDate</td><td>$endDate</td><td>$firstName</td></tr>");
				}
				echo ("</table>");		
		}
catch(PDOException $e) 
{
	echo $e->getMessage();
	}}
?>
</div><!--adminPage-->