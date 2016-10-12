<?php
include "../modules/database.php";

$json = array('grade'  => 0,'lessonCost'=>0);

if(isset($_POST['userName'])){
  $userName=$_POST['userName'];
  $lessonID=$_POST['lessonID'];

  $sql = "SELECT students.grade FROM students,logins
           WHERE students.loginID=logins.loginID AND logins.userName='$userName'";
  $result=$conn->query($sql);
  $row=$result->fetch();
 $json['grade']=$row['grade'];

 $sql="SELECT lessonCost  FROM lessons WHERE lessonID='$lessonID' ";
 $result2=$conn->query($sql);
 $row=$result2->fetch();
$json['lessonCost']=$row['lessonCost'];
}
?>
<?php
echo json_encode($json);
?>
