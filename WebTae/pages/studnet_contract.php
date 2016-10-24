								<!DOCTYPE html>
									<html>
									<head>

									<div class="adminPage">
									</head>
									<body>

									<script>
									var=userName;
									var teacherID;
									var lessonID;
									var showResultSwitch=false;
									var teacherStartDate;
									var teacherEndtDate;
									var chosenStartDate;
									var chosenEndDate;
									var lessonDuration;
									var lessonCost;
									var grade;
									var permission;
									</script>


									  Choose a teacher you want:
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
												  /*success:function(data){
													//alert('lesson ID is '+data.lessonID+' and lesson type is '+data.lessonType);
													var d1=data.lessonID;
													var d2=data.lessonType;
													// $("#classList2").html(data);
												  }*/
												}).responseText);
												//alert('Lesson ID is '+data.lesson1ID);
												var _lesson1ID=data.lesson1ID;
												var _lesson2ID=data.lesson2ID;
												var _lesson3ID=data.lesson3ID;
												var _lesson4ID=data.lesson4ID;
												var _lesson5ID=data.lesson5ID;
												//teacherStartDate=data.teacherStartDate;
												//teacherEndDate=data.teacherEndDate;
												//alert('teacher start-date is '+teacherStartDate);
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


									 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
											  alert('this is not working now!!');
											}
											var arr=[];
											$.ajax({
											  url:'teacherStartDate.php',
											  dataType:'json',
											  type:'post',
											  data:{teacherID:teacherID,teacherStartDate:teacherStartDate,teacherEndDate:teacherEndDate},
											  async: false,
											  success:function(data){
												arr.push(data.month1);
												arr.push(data.month2);
												arr.push(data.month3);
												arr.push(data.month4);
												arr.push(data.month5);
												arr.push(data.month6);
												arr.push(data.month7);
												arr.push(data.month8);
												arr.push(data.month9);
												arr.push(data.month10);
												arr.push(data.month11);
												arr.push(data.month12);
											  }
											});
											var month1=arr[0];
											var month2=arr[1];
											var month3=arr[2];
											var month4=arr[3];
											var month5=arr[4];
											var month6=arr[5];
											var month7=arr[6];
											var month8=arr[7];
											var month9=arr[8];
											var month10=arr[9];
											var month11=arr[10];
											var month12=arr[11];

											$.ajax({
											   url:'dropDownDB.php',
											   type:'post',
											   data: {month1:month1,month2:month2,month3:month3,month4:month4,month5:month5,month6:month6,month7:month7,month8:month8,month9:month9,month10:month10,month11:month11,month12:month12},
											   //async: false
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

									   <?php //어떤 형태로 보여줄 것인가? 라디오 버튼 ?>
									 </div><br>

									 <div class='resultDisplay2' id='resultDisplay2'>
									   Choose one between 30 minutes and 60 minutes<br>
										<input type="radio" name="lessonDuration" value=30 onchange="getDurationFromOld(this.value)" id="duration"> 30 minutes<br>
										<input type="radio" name="lessonDuration" value=60 onchange="getDurationFromOld(this.value)" id="duration"> 60 minutes<br>
									 </div><br>

									<div class='costDisplay' id='costDisplay'>
										Your lesson cost is '<label id='showCost'></label>'.
									<?php
									/*
									final submit
									어떠한 형태로 전개할 것인가?
									제출 후에 DB로 자료를 넣는건 자연스러운가 */ ?>
									<br><br>

									<form>
									<input type='button' onclick="finalClick(this.value)" name='finalButton' id='finalButton' value='Final Submit'>
									</div>

									 <script>
									  $("#resultDisplay").hide();
									  $("#resultDisplay2").hide();
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

										 //alert('start date is '+chosenStartDate);
										 //alert('end date is '+teacherEndDate);
										 var arr=[];
										 $.ajax({
											url:'fillEndDate.php',
											type:'post',
											dataType:'json',
											data: {chosenStartDate:chosenStartDate,teacherEndDate:teacherEndDate},
											async: false,
											success:function(data){
											  arr.push(data.month1);
											  arr.push(data.month2);
											  arr.push(data.month3);
											  arr.push(data.month4);
											  arr.push(data.month5);
											  arr.push(data.month6);
											  arr.push(data.month7);
											  arr.push(data.month8);
											  arr.push(data.month9);
											  arr.push(data.month10);
											  arr.push(data.month11);
											  arr.push(data.month12);
											}
										  });
										  //alert('this is ');
										  var month1=arr[0];
										  var month2=arr[1];
										  var month3=arr[2];
										  var month4=arr[3];
										  var month5=arr[4];
										  var month6=arr[5];
										  var month7=arr[6];
										  var month8=arr[7];
										  var month9=arr[8];
										  var month10=arr[9];
										  var month11=arr[10];
										  var month12=arr[11];

										  $.ajax({
											 url:'endDropDownDB.php',
											 type:'post',
											 data: {month1:month1,month2:month2,month3:month3,month4:month4,month5:month5,month6:month6,month7:month7,month8:month8,month9:month9,month10:month10,month11:month11,month12:month12},
											 //async: false
											 success:function(data){
											   //alert('lesson ID is '+data.lessonType);
											   $("#teacherEndDate").html(data);
											 }
										   });
									  }

									  function getTeachertEndDate(val){
										chosenEndDate=val;
										if(grade=='new'){
										  lessonDuration=30;
										  $("#costDisplay").show();
										  $('#showCost').html(lessonCost);
										}else{
										  $("#resultDisplay2").show();
										}
									  }

									  function getDurationFromOld(val){
										//alert('your choice is '+val);
										lessonDuration=val;
										$("#costDisplay").show();
										$('#showCost').html(lessonCost);
									  }

									  function finalClick(val){
										//alert("this value is "+val);

										permission='no';
										//alert('this is '+permission);

										if (confirm('Are you sure you want to submit this?')){
										  $.ajax({
											 url:'finalSubmit.php',
											 type:'post',
											 data: {userName:userName,teacherID:teacherID,chosenStartDate:chosenStartDate,chosenEndDate:chosenEndDate,lessonID:lessonID,permission:permission},
											 async: false
										   });
										   alert('Your submit will be confirmed by owner within 1-3 days.');
										   if (confirm('Do you want to register for additional lessons?')){
											 window.location="/music_school/pages/contract.php";
										   }else{
											 window.location="/music_school/pages/studentPage.php";
										   }
										}else {
										  window.location="/music_school/pages/studentPage.php";
										}
									  }
										//lessonCost;
									</script>

									</div><!--adminPage-->
									</body>
									</html>		