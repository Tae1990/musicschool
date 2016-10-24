
<?php
//header('Content-type: text/javascript');
include "../modules/database.php";

$json = array(
   //'teacherID' => 0,
   'lesson1ID'  => 0,
   'lesson2ID'  => 0,
   'lesson3ID'  => 0,
   'lesson4ID'  => 0,
   'lesson5ID'  => 0
   //'teacherStartDate'=>0,
   //'teacherEndDate'=>0
);
?>

<?php
if(isset($_POST["teacherID"])){
  $ID = $_POST["teacherID"];

  $sql="SELECT lessonID,lessonType,teacherStartDate,teacherEndDate FROM lessons WHERE teacherID='$ID' ";
  $result2=$conn->query($sql);
  $rowNum2 = $result2->rowCount();
  $row=$result2->fetch(PDO::FETCH_ASSOC);

  //$json['lessonID']=$row['lessonID'];
  $json['lesson1ID']  = $row['lessonID'];
  $row=$result2->fetch(PDO::FETCH_ASSOC);
  $json['lesson2ID']  = $row['lessonID'];
  $row=$result2->fetch(PDO::FETCH_ASSOC);
  $json['lesson3ID']  = $row['lessonID'];
  $row=$result2->fetch(PDO::FETCH_ASSOC);
  $json['lesson4ID']  = $row['lessonID'];
  $row=$result2->fetch(PDO::FETCH_ASSOC);
  $json['lesson5ID']  = $row['lessonID'];
  $row=$result2->fetch(PDO::FETCH_ASSOC);
  //$result3=$conn->query($sql);
  //$row=$result3->fetch();
  //$json['teacherStartDate']=$row['teacherStartDate'];
  //$json['teacherEndDate']=$row['teacherEndDate'];
}
?>

<?php
echo json_encode($json);
?>
