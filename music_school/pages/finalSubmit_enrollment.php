<?php
include "../modules/database.php";

$json = array( array( ) , array( ) );

//chosenCheckBoxArr
$arr=$_POST['chosenCheckBoxArr'];
$userName=$_POST['userName'];
$sql="SELECT studentID FROM logins inner join
      (SELECT studentID,loginID FROM students) AS new1
      ON new1.loginID=logins.loginID AND userName='$userName'";
$result=$conn->query($sql);
$row=$result->fetch(PDO::FETCH_ASSOC);
$studentID = $row['studentID'];
$num=count($arr);

//$num=count($arr);

for($i=0 ; $i<$num ; $i++) {
  $json[1][$i]=$arr[$i];
}

for($i=0;$i<$num;$i++){
  $sql ="INSERT INTO lessonenrolments(lessonTimeID,studentID) VALUES ('$arr[$i]','$studentID')";
  $result=$conn->query($sql);
}
?>

<?php
echo json_encode($json);
?>
