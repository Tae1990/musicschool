

    <div id="wrapper">



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Hired Instruments
                            <small>Teacher</small>
                        </h1> 
                    </div>
                </div>
                <!-- /.row -->
				
				
<div class="products"> 
<?php
     //Get loginID from userName
    $userName = $_SESSION['userName'];
	$row1=$conn->query("SELECT loginID FROM logins WHERE userName ='$userName'")->fetch();
	$loginID = $row1['loginID'];
    $nRows1 = $conn->query("select count(lessonenrolments.lessonEnrolmentID) 
			                        from contracts, lessons, teachers, students, logins, lessontimes, lessonenrolments
									where contracts.lessonID = lessons.lessonID and lessons.teacherID = teachers.teacherID and 
									contracts.studentID = students.studentID and teachers.loginID = logins.loginID and '$loginID' = teachers.loginID
									and lessonenrolments.lessonTimeID = lessontimes.lessonTimeID and lessontimes.lessonID = lessons.lessonID")->fetchColumn();
    if ($nRows1 < 1){
		   echo "Any student have not enrolled to your lessons";
	}
	if ($nRows1 > 0){ 
		try{
			//prepare query
			$stmt = $conn->prepare("SELECT lessons.lessonType, lessons.lessonPlace, students.firstName, lessontimes.day, lessonTimes.time 
			                        from contracts, lessons, teachers, students, logins, lessontimes, lessonenrolments
									where contracts.lessonID = lessons.lessonID and lessons.teacherID = teachers.teacherID and 
									contracts.studentID = students.studentID and teachers.loginID = logins.loginID and '$loginID' = teachers.loginID
									and lessonenrolments.lessonTimeID = lessontimes.lessonTimeID and lessontimes.lessonID = lessons.lessonID");
			//execute
			$stmt->execute();
			// retrieve all rows
			echo ("<table padding:8px width=80% border=0 align='center'>");
			echo ("<tr><th>Day</th><th>Time</th><th>Lesson</th><th>Class</th>
				   <th>Teacher Name</th></tr>");
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$lessonType = $row['lessonType'];
				$lessonPlace = $row['lessonPlace'];
				$firstName = $row['firstName'];
				$day=$row['day'];
				$time=$row['time'];

				echo("<tr><td>$day</td><td>$time</td><td></td>");
				echo("<td>$lessonType</td><td>$lessonPlace</td><td>$firstName</td></tr>");
			}
			echo ("</table>");	
		}// 1st try
catch(PDOException $e) 
{
	echo $e->getMessage();
	}}
?>
</div> <!-- close product div -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
 