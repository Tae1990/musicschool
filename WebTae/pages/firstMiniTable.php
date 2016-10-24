<?php
include "../modules/database.php";

$json = array(
  'teacherFirstName'  => 0,
  'teacherLastName'  => 0,
  'teacherStartDate'  => 0,
  'teacherEndDate'  => 0,
  'lessonCost'  => 0,
);
?>

<?php
if(isset($_POST["lessonID"])){
  $lessonID=$_POST["lessonID"];

  $sql = "SELECT * FROM lessons WHERE lessonID='$lessonID'";
  $result=$conn->query($sql);
  $row=$result->fetch();
  $teacherID=$row['teacherID'];

  $sql="SELECT * FROM teachers WHERE teacherID='$teacherID' ";
  $result=$conn->query($sql);
  $row2=$result->fetch();

 $json['teacherFirstName']=$row2['firstName'];
 $json['teacherLastName']=$row2['lastName'];
 $json['teacherStartDate']=$row['teacherStartDate'];
 $json['teacherEndDate']=$row['teacherEndDate'];
 $json['lessonCost']=$row['lessonCost'];

}?>

<?php
echo json_encode($json);
 ?>
