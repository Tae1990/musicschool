<?php
 include "../modules/session.php";
 include "../modules/database.php";
 include "../modules/sanitize.php";
 include "studentHeader.php";
?>

 <html>
 <head>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

 <?php
  if (!isset($_SESSION['login']) and !isset($_SESSION['error']))
  {
 	echo(
           "<div class=\"login\">
            <form action=\"../modules/login.php\" method=\"post\">
            <div class=\"form-group\">
            <label for=\"userName\">User name</label>
            <input type=\"text\" id=\"userName\" name=\"userName\" placeholder=\"Enter userName\" required>
            </div>
            <div class=\"form-group\">
            <label for=\"password\">Password</label>
            <input type=\"password\" id=\"password\" name=\"password\" placeholder=\"Enter password\">
            </div>
            <button type=\"submit\"> Login</button>
            </form>
            <form action=\"register_student.php\">
            <input type=\"submit\" value=\"Register as student\">
            </form>
 		   <form action=\"register_teacher.php\">
            <input type=\"submit\" value=\"Register as teacher\">
            </form>


 		  </div><!--login-->");
  }
  elseif ( isset($_SESSION['error']) )
  {

 	 echo("<div class=\"login\">
            <form action=\"../modules/login.php\" method=\"post\">
            <div class=\"form-group\">
            <label for=\"userName\">User name</label>
            <input type=\"text\" id=\"userName\" name=\"userName\" placeholder=\"Enter userName\" required>
             </div>
             <div class=\"form-group\">
               <label for=\"password\">Password</label>
               <input type=\"password\" id=\"password\" name=\"password\" placeholder=\"Enter password\">
             </div>
               <button type=\"submit\"> Login</button>
               </form>
               <form action=\"register_student.php\">
            <input type=\"submit\" value=\"Register as student\">
            </form>
 		   <form action=\"register_teacher.php\">
            <input type=\"submit\" value=\"Register as teacher\">
            </form>
 			  ".$_SESSION['error']."
 			</div><!--login-->");
 	unset($_SESSION['error']);
  }
 else
 {
 	echo ("<div class=\"login\">
 		         <form action=\"../modules/logout.php\" method=\"post\">". $_SESSION['userName'] . "
 				 <br>
 				 <button type=\"submit\"> Log out</button>
 				 </form>
 		         </div><!--login-->");
            }
 		  ?>
 <div class="adminPage">

 <style>

 .lessonTable table tr td{
   border:1px solid black;
   width:100;
   height:50px;
   text-align:center;
 }
 .lessonTable table tr td:nth-child(2){
   border:1px solid black;
   width:250;
   height:50px;
   text-align:center;
 }
 .changed table tr td{
   width:300;
   height:30px;
   text-align:center;
 }

 #timeTable tr td{
   border:1px solid black;
   width:30;
   width:70px;
   height:30px;
   text-align:center;
 }
 .assigned{
     background-color: yellow;
 }
 .assigned2{
     background-color: red;
 }
 .assigned3{
     background-color: blue;
 }
 .assigned4{
     background-color: green;
 }
 .assigned5{
     background-color: pink;
 }
 </style>

 </head>

<?php
$userName=$_SESSION['userName'];
$sql = "SELECT students.studentID FROM students,logins
        WHERE students.loginID=logins.loginID AND logins.userName='$userName'";
$result=$conn->query($sql);
$rowStudent=$result->fetch();

$studentID=$rowStudent['studentID'];
$lessonID=$_GET['lessonID'];

$sql = "SELECT * FROM contracts WHERE studentID='$studentID'
         AND lessonID='$lessonID'";
$result=$conn->query($sql);
$contractsRow=$result->fetch();
$permission = $contractsRow['studentContractPermission'];
$numberPerWeek=$contractsRow['numberPerWeek'];
$lessonDuration=$contractsRow['lessonDuration'];
?>

 <script type="text/javascript">
   var permission = "<?php echo $permission; ?>";
   if(permission == 'no'){
     alert('Your permission is still not approved. Please wait.');
   }
 </script>

 <?php
 function giveArrayName($len){
   $checkBoxID=array();
   $base_name="checkBox";
   for($i=1;$i<=$len;$i++){
     $checkBoxID[$i]=$base_name.$i;
   }
   return $checkBoxID;
 }

  ?>

<script>
var lessonTimeID;
var chosenCheckBoxArr=[];
var chosenIndex=0;
</script>

<?php
if($lessonDuration == 1){
  $lessonDuration=30;
}else{
  $lessonDuration=60;
}?>

<p align="center" id='displayDivision2'>
  Your choiceable number is
   <label id='remaining_class_number'>
      <?php
      $remainingClassNumber=$numberPerWeek;
      echo $remainingClassNumber;
   ?>
   </label>
</p>

 <script type="text/javascript">
   var remainingClassNumber = "<?php echo $remainingClassNumber ?>";
   var userName = "<?php echo $userName ?>";
   //alert('this value is '+remainingClassNumber);
 </script>

  <?php

  @$sql="SELECT * FROM lessontimes inner join (SELECT lessonID,lessonType FROM lessons)
       AS new1 WHERE new1.lessonID=lessontimes.lessonID
       AND lessonDuration='$lessonDuration' AND new1.lessonID='$lessonID'";
  $result=$conn->query($sql);
  $row=$result->fetch(PDO::FETCH_ASSOC);
  $rowNum=$result->rowCount();
  $colNum=$result->columnCount();
  $checkBoxArr=giveArrayName($rowNum);
   ?>
<?php

function detectDay($var){
  $var;
  $dayArr=array("Monday","Tuesday","Wednesday","Thursday","Friday");
  for($i=0 ; $i<5; $i++){
    if($var == $dayArr[$i]){
      $var = $i;
      break;
    }else{
      //echo 'you typed wrong letter';
    }
  }
  return $var;
}

function detectTime($var){
  $var;
  $timeArr=array("08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00");
  for($i=0 ; $i<8; $i++){
    if($var == $timeArr[$i]){
      $var = $i;
      break;
    }else{
      //echo 'you typed wrong letter';
    }
  }
  return $var;
}

function giveDay2($day,$time){
  $dayArr=array("Monday","Tuesday","Wednesday","Thursday","Friday");
  $timeArr=array("08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00");
  $arr = array($dayArr,$timeArr);
  $k=0;
  $save=0;
  for($i=0 ; $i<5 ; $i++){
    for($j=0 ; $j<9 ; $j++){

      if($arr[0][$i] == $day && $arr[1][$j] == $time){
        $save=$k;
      }
      $k++;
    }
  }
  return $save;
}

 ?>

 <?php
 if($permission == "no"){
   echo 'Sorry '.$userName.'. Your permission is still not approved. Please wait.';
 }
  ?>
<br><br>
 <body>
<div name="displayDivision" id='displayDivision'>
 <table border='1'>
   <tr>
     <td valign="top">
       <div class='lessonTable'>
       <table id='leftTable'>
         <tr>
           <td>list <br> Number</td>
           <td>Lesson Name</td>
           <td>Day and Time</td>
           <td>Take this lesson</td>
         </tr>

         <?php
         $i=1;
         do{
           $lessonTimeID=$row['lessonTimeID'];
           $availability=$row['availability'];
           $var_1= $row['day'];
           $var_2= $row['time'];
           $count=giveDay2($var_1,$var_2);
           echo '<tr>
                   <td>'.$i.'</td>
                   <td>'.$row['lessonType'].'</td>
                   <td>'.$row['day'].'<br>'.$row['time'].'</td>
                   <td>
                     ';?><?php
                     if($availability == 'on'){ echo '
                     <input type="checkbox" name="'.$count.'" id="'.$checkBoxArr[$i].'" value="'.$lessonTimeID.'"
                       onclick=';?>"check(this.value,this.id,this.name);"<?php echo '><br>';?>
                     <?php
                   }else{
                     ?><?php echo '<p>This time is not available now! </p>';?><?php
                   } echo '
                   </td>
                </tr>';
           $i++;
         }while($row=$result->fetch(PDO::FETCH_ASSOC));

          ?>
          <tr>
            <td colspan="4">
            <input type='button' id='finalButton' onclick="finalClick(this.value)" name='finalButton' value='Final Submit'>
          </td>
          </tr>

       </table>
       <script type="text/javascript">
       // 여기서, 우리는 table Row를 늘려간다. DB에 들어있는 LD만큼을!!
       // 그 전에 test용으로 ? 함수의 시행
       </script>

     </div>
     </td>
     <td valign="top">
       <table id='timeTable'>
         <tr>
           <td class="blank"></td>
           <td class="title">Monday</td>
           <td class="title">Tuesday</td>
           <td class="title">Wednesday</td>
           <td class="title">Thursday</td>
           <td class="title">Friday</td>
         </tr>
         <tr>
           <td class="time">08:00</td>
           <td class="drop" id='0'></td>
           <td class="drop" id='9'></td>
           <td class="drop" id='18'></td>
           <td class="drop" id='27'></td>
           <td class="drop" id='36'></td>
         </tr>
         <tr>
           <td class="time">09:00</td>
           <td class="drop" id='1'></td>
           <td class="drop" id='10'></td>
           <td class="drop" id='19'></td>
           <td class="drop" id='28' ></td>
           <td class="drop" id='37'></td>
         </tr>
         <tr>
           <td class="time">10:00</td>
           <td class="drop" id='2'></td>
           <td class="drop" id='11'></td>
           <td class="drop" id='20'></td>
           <td class="drop" id='29'></td>
           <td class="drop" id='38'></td>
         </tr>
         <tr>
           <td class="time">11:00</td>
           <td class="drop" id='3'></td>
           <td class="drop" id='12'></td>
           <td class="drop" id='21'></td>
           <td class="drop" id='30'></td>
           <td class="drop" id='39'></td>
         </tr>
         <tr>
           <td class="time">12:00</td>
           <td class="drop" id='4'></td>
           <td class="drop" id='13'></td>
           <td class="drop" id='22'></td>
           <td class="drop" id='31'></td>
           <td class="drop" id='40'></td>
         </tr>
         <tr>
           <td class="time">13:00</td>
           <td class="lunch" id='5'>Lunch</td>
           <td class="drop" id='14'>Lunch</td>
           <td class="drop" id='23'>Lunch</td>
           <td class="drop" id='32'>Lunch</td>
           <td class="drop" id='41'>Lunch</td>
         </tr>
         <tr>
           <td class="time">14:00</td>
           <td class="drop" id='6'></td>
           <td class="drop" id='15'></td>
           <td class="drop" id='24'></td>
           <td class="drop" id='33'></td>
           <td class="drop" id='42'></td>
         </tr>
         <tr>
           <td class="time">15:00</td>
           <td class="drop" id='7'></td>
           <td class="drop" id='16'></td>
           <td class="drop" id='25'></td>
           <td class="drop" id='34'></td>
           <td class="drop" id='43'></td>
         </tr>
         <tr>
           <td class="time">16:00</td>
           <td class="drop" id='8'></td>
           <td class="drop" id='17'></td>
           <td class="drop" id='26'></td>
           <td class="drop" id='35'></td>
           <td class="drop" id='44'></td>
         </tr>
       </table>
     </td>
   </tr>
 </table>
 </div>

 </body>

 <script>

 function check(val,val2,val3){
   lessonTimeID = val ;
   var checkBoxId = val2 ;
   var count=val3;
   //alert('this is '+count);

   var ch1=document.getElementById(checkBoxId).checked;

   if(ch1){

     if(remainingClassNumber >0){
       remainingClassNumber-=1;
       document.getElementById('remaining_class_number').innerHTML=remainingClassNumber;
       chosenCheckBoxArr[chosenIndex]=lessonTimeID;
       chosenIndex++;
     }else{
       //var name=document.getElementsByName('checkBoxName').name;
       alert('You cannot choose more!');
       document.getElementById(checkBoxId).checked=false;
       //document.getElementById('checkBox1').disabled='true';
     }
   }else{
     remainingClassNumber+=1;
     document.getElementById('remaining_class_number').innerHTML=remainingClassNumber;
     delete chosenCheckBoxArr[chosenIndex-1];
     chosenIndex--;
     //alert('this 111 is '+chosenCheckBoxArr[chosenIndex-1]);
   }
   var i=0;
   for(i=0;i<45;i++){
     if(count == i && ch1){
       $('#'+i).addClass('assigned');
     }
   }

   for(i=0;i<45;i++){
     if(count == i && !ch1){
       $('#'+i).removeClass('assigned');
     }
   }
 }

 function finalClick(val){

   if (confirm('Are you sure you want to submit this?')){
     $.ajax({
        url:'finalSubmit_enrollment.php',
        type:'post',
        data: {chosenCheckBoxArr:chosenCheckBoxArr,userName:userName},
        dataType:'json',
        async: false,
        success:function(data){
        }
      });
      window.location='/music_school/pages/studentPage.php';
    }
 }
 </script>

 <?php
 if($permission == "no"){  ?>
   <script type="text/javascript"> $("#displayDivision,#displayDivision2,#finalButton").hide(); </script><?php
 }else{?>
   <script type="text/javascript"> $("#displayDivision,#displayDivision2,#finalButton").show(); </script><?php
 }
  ?>

 </div>
 </body>

 </html>
<?php
 include "footer.php";
?>
