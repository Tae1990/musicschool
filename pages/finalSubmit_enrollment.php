<?php
include "../modules/database.php";

$json = array( array( ) , array( ) );

//chosenCheckBoxArr
$lessonTimeIDArr=$_POST['chosenCheckBoxArr']; // this is lessonTimeID. why is this array?
                                            // times some students can choose per a week can vary !
$lessonID=$_POST['lessonID']; // This is number checked in lessons.
$chosenIndex=$_POST['chosenIndex'];
$userName=$_POST['userName'];
$sql="SELECT studentID FROM logins inner join
      (SELECT studentID,loginID FROM students) AS new1
      ON new1.loginID=logins.loginID AND userName='$userName'";
$result=$conn->query($sql);
$row=$result->fetch(PDO::FETCH_ASSOC);
$studentID = $row['studentID'];
$num=count($lessonTimeIDArr);

//$num=count($lessonTimeIDArr);

for($i=0 ; $i<$num ; $i++) {
  $json[1][$i]=$lessonTimeIDArr[$i];
}

for($i=0;$i<$num;$i++){
  // It is necessary to update lessontimes.
  $var="off";
  $sql2="UPDATE lessontimes set availability='$var'
        where lessonTimeID='$lessonTimeIDArr[$i]'";
  $resul2t=$conn->query($sql2);

  $sql ="INSERT INTO lessonenrolments(lessonTimeID,studentID) VALUES ('$lessonTimeIDArr[$i]','$studentID')";
  $result=$conn->query($sql);
}

$sql3="UPDATE contracts set numberPerWeek=(numberPerWeek-$chosenIndex)
       where lessonID='$lessonID' and studentID='$studentID'";
$result3=$conn->query($sql3);
?>

<?php
echo json_encode($json);
?>
