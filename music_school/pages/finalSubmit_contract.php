<?php
include "../modules/database.php";

$userName=$_POST['userName'];
$sql = "SELECT students.studentID FROM students,logins
        WHERE students.loginID=logins.loginID AND logins.userName='$userName'";
$result=$conn->query($sql);
$row=$result->fetch();
$studentID=$row['studentID'];

$teacherID=$_POST['teacherID'];
$chosenStartDate=$_POST['chosenStartDate'];
$chosenEndDate=$_POST['chosenEndDate'];
$lessonID=$_POST['lessonID'];
$permission=$_POST['permission'];
$lessonDuration=$_POST['lessonDuration'];
$numberPerWeek=$_POST['numberPerWeek'];

/*  ****** This is for test ********
$studentID=5;
$chosenStartDate='2017-11-01';
$chosenEndDate='2017-11-30';
$lessonID=1;
//$permission=$_POST['permission'];
$lessonDuration=1;
$numberPerWeek=1;
$permission='no';
*/

$lessonID_exit=false;
$startDate_exit=false;
$endDate_exit=false;

$different_startDate_arr=array();

function compare($var,$db,$studentID,$lessonID){
  $arr=array();
  include "../modules/database.php";
  $sql2 = "SELECT * FROM contracts WHERE studentID='$studentID'
           AND lessonID='$lessonID' ORDER BY studentContractID";
  $result2 = $conn->query($sql2);
  $row2=$result2->fetch(PDO::FETCH_ASSOC);
  $rowNum=$result2->rowCount();
  $j=0;
  for($i=0; $i<$rowNum; $i++){
    if($var == $row2[$db]){
      echo $db.' appears'.'<br>';
      echo $var.'<br>';
      echo $row2[$db].'<br>';
      $arr[$j]=$row2['studentContractID'];
      $j++;
    }
    $row2=$result2->fetch(PDO::FETCH_ASSOC);
  }
  return $arr;
}

function compare2($var,$db,$studentID,$lessonID){
  $arr=array();
  include "../modules/database.php";
  $sql2 = "SELECT * FROM contracts WHERE studentID='$studentID'
           AND lessonID='$lessonID' ORDER BY studentContractID";
  $result2 = $conn->query($sql2);
  $row2=$result2->fetch(PDO::FETCH_ASSOC);
  $rowNum=$result2->rowCount();
  $j=0;
  for($i=0; $i<$rowNum; $i++){
    if($var != $row2[$db]){
      echo $db.' appears'.'<br>';
      echo $var.'<br>';
      echo $row2[$db].'<br>';
      $arr[$j]=$row2['studentContractID'];
      //echo $arr[$j];
      $j++;
    }
    $row2=$result2->fetch(PDO::FETCH_ASSOC);
  }
  return $arr;
}

function diff_startDate($studentID,$lessonID,$chosenStartDate,$chosenEndDate){

  $trueOrFalse;
  include "../modules/database.php";
  $sql = "SELECT * FROM contracts WHERE studentID='$studentID'
           AND lessonID='$lessonID' ORDER BY studentContractID";
  $result = $conn->query($sql);
  $row=$result->fetch(PDO::FETCH_ASSOC);
  $rowNum=$result->rowCount();
  $j=0;

  for($i=0; $i<$rowNum; $i++){
    $chosenStartDate=date_create($chosenStartDate);
    $row['studentEndDate']=date_create($row['studentEndDate']);

    $chosenEndDate=date_create($chosenEndDate);
    $row['studentStartDate']=date_create($row['studentStartDate']);

    $diff=date_diff($row['studentEndDate'],$chosenStartDate);
    $diff2=date_diff($chosenEndDate,$row['studentStartDate']);
    $var=$diff->format("%R%a");
    $var2=$diff2->format("%R%a");

    if($var>0 || $var2>0){
      $arr[$j]=$row['studentContractID'];
      $j++;
      $trueOrFalse=true;
    }else{
      echo '<br>';
      $trueOrFalse=false;
    }
    $row=$result->fetch(PDO::FETCH_ASSOC);
  }
  return $trueOrFalse;
}

$lessonIndexArr=compare($lessonID,'lessonID',$studentID,$lessonID);
$startIndexArr=compare($chosenStartDate,'studentStartDate',$studentID,$lessonID);
$endIndexArr=compare($chosenEndDate,'studentEndDate',$studentID,$lessonID);

//$endDate_exit
echo '<br>';

if(count($lessonIndexArr) != 0){
  echo '11111'.'<br>';
  $lessonID_exit=true;
}
if(count($startIndexArr) != 0 && $lessonID_exit){
  $startDate_exit=true;
  echo '22222'.'<br>';
}
if(count($endIndexArr) != 0 && $lessonID_exit && $startDate_exit){
  echo '33333'.'<br>';
  $endDate_exit=true;
}

function dateCompare($date1,$date2){
  $date1=date_create($date1);
  $date2=date_create($date2);
  $diff=date_diff($date1,$date2);
  $var=$diff->format("%R%a").'<br>';
  if($var>0){
    return $date2;
  }else{
    return $date1;
  }
}

function compareEndDate($chosenEndDate,$arrindex,$studentID){
  include "../modules/database.php";
  $arr=array();
  for($i=0; $i<count($arrindex) ; $i++){
    $sql = "SELECT studentStartDate,studentEndDate FROM contracts WHERE studentID='$studentID'
            AND studentContractID='$arrindex[$i]'  ORDER BY studentContractID";
    $result = $conn->query($sql);
    $row=$result->fetch();
    $arr[$i]=$row['studentStartDate'];
    $arr[$i+1]=$row['studentEndDate'];
    //echo '<br>';
  }
  //echo $arr[0];echo 'here222'.'<br>';
  ///echo '<br>';echo '<br>';
  $arr[1]=dateCompare($chosenEndDate,$arr[1]);
  $arr[1] = $arr[1]->format('Y-m-d');

  return $arr;
}
echo '<br>';

if($lessonID_exit){
  if($startDate_exit){
    if($endDate_exit){
      //end-date마저 같다?자료가 중복되므로 걍 나가
      echo 'here111'.'<br>';
    }else{
      // 가장 긴 end_date를 가진 값으로 넣어준다 --업데이트 하라고
      $updateDate=compareEndDate($chosenEndDate,$startIndexArr,$studentID);
      echo $updateDate[0].'<br>';
      echo $updateDate[1].'<br>';
      echo 'here2'.'<br>';
      $sql="update contracts
            set studentEndDate='$updateDate[1]',lessonDuration='$lessonDuration',numberPerWeek='$numberPerWeek'
            where studentID='$studentID' and lessonID='$lessonID' and
            studentStartDate='$updateDate[0]'";
      $result=$conn->query($sql);
    }
  }else{ // start-date가 다른 경우라면 ,
    echo 'here33333'.'<br>';
    //기간이 중복되지 않는다면
    $isITTrue=diff_startDate($studentID,$lessonID,$chosenStartDate,$chosenEndDate);
    if($isITTrue){
      $sql ="INSERT INTO contracts(studentID,studentStartDate,studentEndDate,lessonID,lessonDuration,numberPerWeek,studentContractPermission)
             VALUES ('$studentID','$chosenStartDate','$chosenEndDate','$lessonID','$lessonDuration','$numberPerWeek','$permission')";
      $result=$conn->query($sql);
    }
    //기간이 중복된다면 새로운 데이터로 바꿔줄꺼야

  }
}else{ // 같은 레슨 아이디가 존재하지 않는다면
  //insert();
  $sql ="INSERT INTO contracts(studentID,studentStartDate,studentEndDate,lessonID,lessonDuration,numberPerWeek,studentContractPermission)
         VALUES ('$studentID','$chosenStartDate','$chosenEndDate','$lessonID','$lessonDuration','$numberPerWeek','$permission')";
  $result=$conn->query($sql);
}

?>
