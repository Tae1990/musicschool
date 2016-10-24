
    <div id="wrapper">



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Coasdasdasd
                            <small>Student</small>
                        </h1> 
                    </div>
                </div>
                <!-- /.row -->

<div class="adminPage">
<?php
    //Get loginID from userName
    $userName = $_SESSION['userName'];
	$row1=$conn->query("SELECT loginID FROM logins WHERE userName ='$userName'")->fetch();
	$loginID = $row1['loginID'];
	$nRows = $conn->query("select count(contracts.studentContractID) AS NumberOfContract from contracts
	                       INNER JOIN students ON contracts.studentID = students.studentID
						   INNER JOIN logins ON students.loginID = '$loginID'")->fetchColumn();
    if ($nRows < 1)
    {
	   echo "You don't have any contracts with teachers";
    }
    if ($nRows > 0){
		$row2=$conn->query("SELECT studentContractPermission FROM contracts")->fetch();
		$permission = $row2["studentContractPermission"];
        if ($permission == "yes"){		
			try{
				//Get loginID from userName
				$userName = $_SESSION['userName'];
				$row2=$conn->query("SELECT loginID FROM logins WHERE userName ='$userName'")->fetch();
				$loginID = $row2['loginID'];
				//prepare query
				$stmt = $conn->prepare("SELECT lessons.lessonType, lessons.lessonPlace, 
									   contracts.studentStartDate, contracts.studentEndDate, contracts.lessonDuration, contracts.numberPerWeek, 
									   teachers.firstName from contracts, lessons, teachers, students, 
									   logins where contracts.lessonID = lessons.lessonID and lessons.teacherID = teachers.teacherID and 
									   contracts.studentID = students.studentID and students.loginID = logins.loginID and '$loginID' = students.loginID");
					//execute
					$stmt->execute();
					// retrieve all rows
					echo ("<table padding:8px width=80% border=0 align='center'>");
					echo ("<tr><th> Lesson Type</th><th>Lesson Duration</th><th>Lessons per week</th>
						   <th>Lesson Place</th><th>Start Date</th><th>End Date</th><th>Teacher Name</th></tr>");

					while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
					{
						$lessonType = $row["lessonType"];
						$lessonDuration = $row["lessonDuration"];
						if($lessonDuration == 1){
							$lessonDuration = 30;
						}else{
							$lessonDuration = 60;
						}
						$lessonPlace = $row["lessonPlace"];
						$startDate = $row["studentStartDate"];
						$endDate = $row["studentEndDate"];
						$firstName = $row["firstName"];
						$numberPerWeek =$row["numberPerWeek"];
						
						echo("<tr><td>$lessonType</td><td>$lessonDuration minutes</td><td>$numberPerWeek</td>");
						echo("<td>$lessonPlace</td><td>$startDate</td><td>$endDate</td><td>$firstName</td></tr>");
					}
					echo ("</table>");		
			}
		
catch(PDOException $e) 
{
	echo $e->getMessage();
	}}
		else{
			echo "The contrac has not permitted yet.\n<br />\n<br />";
			echo "The proccess will be completed in 24 hours.";
        }
	}
?>
</div><!--adminPage-->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
 