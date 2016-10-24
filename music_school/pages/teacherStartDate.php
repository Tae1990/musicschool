<?php
$json=array( );
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
//$date1='2015-05-31';
//echo dateSorting($date1,1)
?>
<?php
if(isset($_POST["teacherStartDate"],$_POST["teacherEndDate"])){

  $teacherStartDate = $_POST["teacherStartDate"];
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
    $eachDate[0]=$teacherStartYear.'-'.$months[0].'-'.$teacherStartDay;
    //echo '<br>';
    $Year;
    for($i=1;$i<$month_diff-1;$i++){
      if($i <= $first_diff-1){
        $Year=$teacherStartYear;
      }else{
        $Year=$teacherEndYear;
      }
      $eachDate[$i]=$Year.'-'.$months[$i].'-'.$teacherStartDay;
      //echo '<br>';
    }
    $eachDate[$month_diff-1]=$Year.'-'.$months[$month_diff-1].'-'.$teacherStartDay;
  }else{
    $eachDate[0]=$teacherStartYear.'-'.$months[0].'-'.$teacherStartDay;
    //echo '<br>';
    $Year;
    for($i=1;$i<$month_diff-1;$i++){
      $eachDate[$i]=$teacherStartYear.'-'.$months[$i].'-'.$teacherStartDay;
      //echo '<br>';
    }
    $eachDate[$month_diff-1]=$teacherStartYear.'-'.$months[$month_diff-1].'-'.$teacherStartDay;
  }

  $num=count($eachDate);
  for($i=0; $i < $num ; $i++){
    if(!empty($eachDate[$i])){
      $json[$i]=$eachDate[$i];
    }
  }
}?>

<?php
echo json_encode($json);
 ?>
