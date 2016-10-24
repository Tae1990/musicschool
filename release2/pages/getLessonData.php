<?php
include "../modules/database.php";

$json = array(
   'userName'  => 0,
   'lessonType'  => 0,
   'teacherFirstName'=>0,
   'teacherLastName'=>0,
   //'lessonDuration'=>0,
   'lessonCost'  => 0,
   'teacherStartDate'=>0,
   'teacherEndDate'=>0
);
 ?>

<?php
if(isset($_POST['lessonID'],$_POST['userName'])){
  $userName=$_POST['userName'];
  $json['userName']=$userName;


  $lessonID=$_POST['lessonID'];
  $sql="SELECT * FROM lessons WHERE lessonID='$lessonID' ";
  $result=$conn->query($sql);
  $row=$result->fetch();
  $json['lessonType']=$row['lessonType'];
  $teacherID=$row['teacherID'];
  //$json['lessonDuration']=$row['lessonDuration'];
  $json['lessonCost']=$row['lessonCost'];
  $json['teacherStartDate']=$row['teacherStartDate'];
  $json['teacherEndDate']=$row['teacherEndDate'];

  $sql="SELECT * FROM teachers WHERE teacherID='$teacherID' ";
  $result=$conn->query($sql);
  $row=$result->fetch();
  $json['teacherFirstName']=$row['firstName'];
  $json['teacherLastName']=$row['lastName'];
}
?>

<?php
echo json_encode($json);
?>
