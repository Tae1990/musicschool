<?php
$json = array( array(), array() );
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


  if(isset($_POST["chosenEndDate"])){
    $teacherEndDate = $_POST["chosenEndDate"];
  }else{
    $teacherEndDate = $_POST["teacherEndDate"];
  }


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
  $real_month_diff;

  if($teacherStartYear==$teacherEndYear){
    $month_diff=$teacherEndMonth-$teacherStartMonth+1;
    $real_month_diff=$month_diff;
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
    $real_month_diff=$month_diff;
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

  $json[1][0]=$real_month_diff;

  for($i=0; $i<12; $i++){
    if(!empty($eachDate[$i])){
      $json[0][$i]=$eachDate[$i];
    }
  }
}?>

<?php
echo json_encode($json);
 ?>
