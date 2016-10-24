<?php
include "../modules/database.php";


$userName=$_POST['userName'];
$sql = "SELECT students.studentID FROM students,logins WHERE students.loginID=logins.loginID AND logins.userName='$userName'";
$result=$conn->query($sql);
$row=$result->fetch();
$studentID=$row['studentID'];

$teacherID=$_POST['teacherID'];
$chosenStartDate=$_POST['chosenStartDate'];
$chosenEndDate=$_POST['chosenEndDate'];
$lessonID=$_POST['lessonID'];
$permission=$_POST['permission'];

$sql ="INSERT INTO contracts(studentID,studentStartDate,studentEndDate,lessonID,studentContractPermission) VALUES ('$studentID','$chosenStartDate','$chosenEndDate','$lessonID','$permission')";
$result=$conn->query($sql);
?>
