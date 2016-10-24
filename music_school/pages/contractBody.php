<!DOCTYPE html>
<html>
<head>
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
</head>
<body>

<script>var=userName;var teacherID;var lessonID;var showResultSwitch=false;var teacherStartDate;var teacherEndtDate;var chosenStartDate;var chosenEndDate;var lessonDuration;var lessonCost;var grade;var permission;var real_month_diff;var numberPerWeek;var totalLessonCost;</script>  Choose a teacher you want:
     <select name="teachers" onchange="getTeacherID(this.value)">
       <option value="">Select a teacher</option>
       <?php
       $sql="SELECT * FROM teachers";
       $result1=$conn->query($sql);
       //$s= "selected=\"true\"";
       $rowNum = $result1->rowCount(); ?>
       <?php
       $row=$result1->fetch(PDO::FETCH_ASSOC);
        for($i=1;$i<$rowNum+1;$i++){ ?>
          <option value=<?php echo $row['teacherID']; ?>>
            <?php echo $row['firstName'];?></option>
          <?php
          $row=$result1->fetch(PDO::FETCH_ASSOC);
        } ?>
     </select><br><br>

     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
     <?php $userName=$_SESSION['userName'];?>
       Choose classes you want to take :
       <select name="class2" onchange="getLessonID(this.value,'<?php echo $userName; ?>')" id="classList2">
         <option value=""></option>
       </select><br><br>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script type="text/javascript">
        //var ajaxResult;
        function getTeacherID(val){
           //alert(val);
           teacherID=val;
           //var teacherID=val;
           var data=$.parseJSON($.ajax({
              url:'getTeacherData.php',
              dataType:'json',
              type:'post',
              data:'teacherID='+val,
              async: false
            }).responseText);
            //alert('Lesson ID is '+data.lesson1ID);
            var _lesson1ID=data.lesson1ID;
            var _lesson2ID=data.lesson2ID;
            var _lesson3ID=data.lesson3ID;
            var _lesson4ID=data.lesson4ID;
            var _lesson5ID=data.lesson5ID;

            $.ajax({
              url:'classRegis.php',
              type:'post',
              data:{lesson1ID:_lesson1ID,lesson2ID:_lesson2ID,lesson3ID:_lesson3ID,lesson4ID:_lesson4ID,lesson5ID:_lesson5ID},
              success:function(data){
                //alert('hihihihihihi');
                $('#classList2').html(data);
              }
            });
        }
        //alert('This is '+ajaxResult);
     </script>



 <script type="text/javascript">
    //var ajaxResult;
    function getLessonID(val,val2){
       lessonID=val;
       showResultSwitch=true;
       userName=val2;

       var teacherDateArr=[];
       $.ajax({
          url:'getLessonData.php',
          dataType:'json',
          type:'post',
          data: {lessonID:lessonID,userName:userName},
          async: false,
          success:function(data){
            $("#userName").html(data.userName);
            $("#lessonType").html(data.lessonType);
            $("#teacherFirstName").html(data.teacherFirstName);
            $("#teacherLastName").html(data.teacherLastName);
            teacherDateArr.push(data.teacherStartDate);
            teacherDateArr.push(data.teacherEndDate);
          }
        });
        teacherStartDate=teacherDateArr[0];
        teacherEndDate=teacherDateArr[1];
        //alert('this is teacher end-date '+teacherEndDate);

        if(showResultSwitch==true){
          $("#resultDisplay").show();
        }else{
          //alert('this is not working now!!');
        }
        var monthArr=[];
        $.ajax({
          url:'teacherStartDate.php',
          dataType:'json',
          type:'post',
          data:{teacherID:teacherID,teacherStartDate:teacherStartDate,teacherEndDate:teacherEndDate},
          async: false,
          success:function(data){
            var i;
            for(i=0; i<data.length ; i++){
              monthArr.push(data[i]);
            }
          }
        });

        $.ajax({
           url:'dropDownDB.php',
           type:'post',
           data: {monthArr:monthArr},
           success:function(data){
             //alert('lesson ID is '+data.lessonType);
             $("#teacherStartDate").html(data);
           }
         });
    }
 </script>

 <div class='resultDisplay' id='resultDisplay'>
   Hi. <label id='userName'></label> !!<br><br>
   The class name you selected is '<label id='lessonType'></label>'.<br><br>
   and teacher's name of the class you selected is '<label id='teacherFirstName'></label> <label id='teacherLastName'></label>'.<br><br>
   Choose your start-date and end-month:
   <select name="teacherStartDate" onchange="getTeachertStartDate(this.value)" id="teacherStartDate">
   </select>
   <label>   </label>
   <select name="teacherStartDate" onchange="getTeachertEndDate(this.value)" id="teacherEndDate">
     <option>choose start-date first!</option>
   </select>
 </div><br>

 <div class='decide_minute' id='decide_minute'>

   Choose lesson duration time in a day. <br>

   <input type="radio" name="lessonDuration" value=1 onchange="getDuration(this.value)" id="duration"> 30 minutes<br>
   <input type="radio" name="lessonDuration" value=2 onchange="getDuration(this.value)" id="duration"> 60 minutes<br><br>
 </div>

 <div class='resultDisplay_numb_week' id='resultDisplay_numb_week'>

   Choose one between 1-3 times per a week!<br>
   Lesson Cost will differ according to the number you choose!!<br>
    <input type="radio" name="chooseWeekNumb" value=1 onchange="chooseWeekNumb(this.value)" id="chooseWeekNumb"> 1 time<br>
    <input type="radio" name="chooseWeekNumb" value=2 onchange="chooseWeekNumb(this.value)" id="chooseWeekNumb"> 2 times<br>
    <input type="radio" name="chooseWeekNumb" value=3 onchange="chooseWeekNumb(this.value)" id="chooseWeekNumb"> 3 times<br>
 </div><br>



<div class='costDisplay' id='costDisplay'>
    Your lesson cost is '<label id='showCost'></label>'.

<br><br>

<form>
<input type='button' id='finalButton' onclick="finalClick(this.value)" name='finalButton' id='finalButton' value='Final Submit'>
</div>

<script>

</script>

 <script>
  $("#resultDisplay").hide();
  $("#resultDisplay_numb_week").hide();
  $("#decide_minute").hide();
  $("#costDisplay").hide();
 </script>

<script>
  function getTeachertStartDate(val){
    chosenStartDate=val;
    //무엇을 해야하는가? 학생 등급이 new이면 라디오버튼에 2개를, old이면 하나를
    //var lessonCost;
    $.ajax({
       url:'getStudentGrade.php',
       type:'post',
       dataType:'json',
       data: {userName:userName,lessonID:lessonID},
       async: false,
       success:function(data){
         grade=data.grade;
         lessonCost=data.lessonCost;
       }
     });

     var arr=[];
     $.ajax({
        url:'fillEndDate.php',
        type:'post',
        dataType:'json',
        data: {chosenStartDate:chosenStartDate,teacherEndDate:teacherEndDate},
        async: false,
        success:function(data){
          var i;
          for(i=0 ; i< 12; i++){
            arr.push(data[0][i]);
          }
        }
      });
      var monthArr=[];
      var j;
      for(j=0; j<12; j++){
        if(arr[j] == null){
          break;
        }
        monthArr[j]=arr[j];
      }

      $.ajax({
         url:'endDropDownDB.php',
         type:'post',
         data: {monthArr:monthArr},
         success:function(data){
           $("#teacherEndDate").html(data);
         }
       });
  }

  function getTeachertEndDate(val){
    chosenEndDate=val;

    $.ajax({
       url:'fillEndDate.php',
       type:'post',
       dataType:'json',
       data: {chosenStartDate:chosenStartDate,teacherEndDate:teacherEndDate,chosenEndDate:chosenEndDate},
       async: false,
       success:function(data){
          real_month_diff=data[1][0];
       }
     });
     $('#decide_minute').show();
  }

  function chooseWeekNumb(val){
    numberPerWeek=val;
    //alert('this is '+ numberPerWeek);
     totalLessonCost=lessonCost*real_month_diff*lessonDuration*numberPerWeek;
    $("#costDisplay").show();
    $('#showCost').html(totalLessonCost);
  }

  function getDuration(val){
    lessonDuration=val;

    if(grade == 'new'){
      //alert('this is '+real_month_diff);
     numberPerWeek=1;
     totalLessonCost=lessonCost*real_month_diff*lessonDuration*numberPerWeek;
     $("#costDisplay").show();
     $('#showCost').html(totalLessonCost);
    }else{
      $("#resultDisplay_numb_week").show();
    }
    // $("#costDisplay").show();
    // $('#showCost').html(lessonCost);
  }

  function finalClick(val){
    //alert("this value is "+val);
    permission='no';
    //alert('this is '+lessonID);
    if (confirm('Are you sure you want to submit this?')){
      $.ajax({
         url:'finalSubmit_contract.php',
         type:'post',
         data: {userName:userName,teacherID:teacherID,chosenStartDate:chosenStartDate,chosenEndDate:chosenEndDate,lessonID:lessonID,permission:permission,lessonDuration:lessonDuration,numberPerWeek:numberPerWeek},
         async: false
       });
       alert('Your submit will be confirmed by owner within 1-3 days.');
       if (confirm('Do you want to register for additional lessons?\n If you click No, you would move into a new page to decide specific days and time.')){
         window.location="/music_school/pages/contract.php";
       }else{
         window.location='/music_school/pages/studentPage.php';
       }
    }else{
      window.location="/music_school/pages/contract.php";
    }
  }
</script>
</div><!--adminPage-->
</body>
</html>
