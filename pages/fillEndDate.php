<?php
//header('Content-type: text/javascript');
$json = array(
    'month1'  => 0,
   'month2'  => 0,
   'month3'  => 0,
   'month4'  => 0,
   'month5'  => 0,
   'month6'  => 0,
   'month7'  => 0,
   'month8'  => 0,
   'month9'  => 0,
   'month10'  => 0,
   'month11'  => 0,
   'month12'  => 0
);
?>

<?php
function dateSorting($date1,$choice){
  //$date1='2015-05-31';
  $all=preg_replace("/[^0-9]/","",$date1);
  $year=(int)($all/10000);
  $month;
  $day;
  $monthDay=$all%10000;
  //echo $num_length=strlen((string)$year);
  if( strlen((string)$monthDay)==3){
    $month=(int)($monthDay/100);
    $day=($monthDay%100);
  }else{
    $month=(int)($monthDay/100);
    $day=($monthDay%100);
  }

  if($choice==1){
    return $year;
  }elseif($choice==2){
    return $month;
  }else{
    return $day;
  }
}

function settingEndDay($month){
  if($month==1){
    return $month=$month.'-'.'31';
  }
  if($month==2){
    return $month=$month.'-'.'28';
  }
  if($month==3){
    return $month=$month.'-'.'31';
  }
  if($month==4){
    return $month=$month.'-'.'30';
  }
  if($month==5){
    return $month=$month.'-'.'31';
  }
  if($month==6){
    return $month=$month.'-'.'30';
  }
  if($month==7){
    return $month=$month.'-'.'31';
  }
  if($month==8){
    return $month=$month.'-'.'31';
  }
  if($month==9){
    return $month=$month.'-'.'30';
  }
  if($month==10){
    return $month=$month.'-'.'31';
  }
  if($month==11){
    return $month=$month.'-'.'30';
  }
  if($month==12){
    return $month=$month.'-'.'31';
  }
}
?>
<?php
if(isset($_POST["chosenStartDate"],$_POST["teacherEndDate"])){

  $teacherStartDate = $_POST["chosenStartDate"];
  $teacherEndDate = $_POST["teacherEndDate"];

  $teacherStartYear=dateSorting($teacherStartDate,1);
  $teacherStartMonth=dateSorting($teacherStartDate,2);
  $teacherEndYear=dateSorting($teacherEndDate,1);
  $teacherEndMonth=dateSorting($teacherEndDate,2);
  $teacherStartDay='0'.dateSorting($teacherStartDate,3);
  $teacherEndDay=dateSorting($teacherEndDate,3);

  //$json['teacherStartYear']=$teacherStartYear;

  $months=array();
  $month_diff;
  $first_diff;
  $eachDate=array();

  if($teacherStartYear==$teacherEndYear){
    $month_diff=$teacherEndMonth-$teacherStartMonth+1;
    $startingPoint=$teacherStartMonth;

    for($i=0;$i<$month_diff;$i++){
      $months[$i]=$startingPoint;
      $startingPoint++;
      if($months[$i]<=9){
        $months[$i]='0'.$months[$i];
        //echo '<br>';
      }
    }
  }else{
    $first_diff=12-$teacherStartMonth+1;
    $month_diff=$first_diff+$teacherEndMonth;
    $startingPoint=$teacherStartMonth;
    $mod=1;
    for($i=0;$i<$month_diff;$i++){
      if($startingPoint<=12){
        $months[$i]=$startingPoint;
        //echo '<br>';
      }else{
        $months[$i]=$startingPoint-12;
        //echo '<br>';
      }
      if($months[$i]<=9){
        $months[$i]='0'.$months[$i];
        //echo '<br>';
      }
      $startingPoint++;
    }

  }

  if($teacherStartYear!=$teacherEndYear){
    $eachDate[0]=$teacherStartYear.'-'.settingEndDay($months[0]);
    //echo '<br>';
    $Year;
    for($i=1;$i<$month_diff-1;$i++){
      if($i <= $first_diff-1){
        $Year=$teacherStartYear;
      }else{
        $Year=$teacherEndYear;
      }
      $eachDate[$i]=$Year.'-'.settingEndDay($months[$i]);
      //echo '<br>';
    }
    $eachDate[$month_diff-1]=$Year.'-'.settingEndDay($months[$month_diff-1]);
  }else{
    $eachDate[0]=$teacherStartYear.'-'.settingEndDay($months[0]);
    //echo '<br>';
    $Year;
    for($i=1;$i<$month_diff-1;$i++){
      $eachDate[$i]=$teacherStartYear.'-'.settingEndDay($months[$i]);
      //echo '<br>';
    }
    $eachDate[$month_diff-1]=$teacherStartYear.'-'.settingEndDay($months[$month_diff-1]);
  }

if(!empty($eachDate[0])){
  $json['month1']=$eachDate[0];
}
if(!empty($eachDate[1])){
  $json['month2']=$eachDate[1];
}
if(!empty($eachDate[2])){
  $json['month3']=$eachDate[2];
}
if(!empty($eachDate[3])){
  $json['month4']=$eachDate[3];
}
if(!empty($eachDate[4])){
  $json['month5']=$eachDate[4];
}
if(!empty($eachDate[5])){
  $json['month6']=$eachDate[5];
}
if(!empty($eachDate[6])){
  $json['month7']=$eachDate[6];
}
if(!empty($eachDate[7])){
  $json['month8']=$eachDate[7];
}
if(!empty($eachDate[8])){
  $json['month9']=$eachDate[8];
}
if(!empty($eachDate[9])){
  $json['month10']=$eachDate[9];
}
if(!empty($eachDate[10])){
  $json['month11']=$eachDate[10];
}
if(!empty($eachDate[11])){
  $json['month12']=$eachDate[11];
}
}?>

<?php
echo json_encode($json);
 ?>
