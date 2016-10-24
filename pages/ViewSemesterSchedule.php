<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='assets/css/fullcalendar.css' rel='stylesheet' />
<link href='assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='assets/js/moment.min.js'></script>
<script src='assets/js/jquery.min.js'></script>
<script src='assets/js/jquery-ui.min.js'></script>
<script src='assets/js/fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {

		var zone = "05:30";  //Change this to your timezone

	$.ajax({  //가져오는 부분인듯
		url: 'process.php',
        type: 'POST', // Send post data
        data: 'type=fetch', //이부분에서 가져옴
        async: false, 
        success: function(s){
        	json_events = s;  //이부분에서 가져옴
        }
	});



		
		
		$('#calendar').fullCalendar({
			events: JSON.parse(json_events),
			//agendaMusicschoolDay: JSON.parse(json_events),
			//events: [{"id":"14","title":"New Event","start":"2015-01-24T16:00:00+04:00","allDay":false}],
			utc: true,
			header: {
		//			center: 'title' // buttons for switching between views
		//			left: 'prev,next today',
		//		center: 'title',
		//		right: 'month,agendaWeek,agendaDay'
			 },
			editable: true,
			droppable: true, 
			slotDuration: '01:00:00',
			firstDay: 1,  //make it monday start
			hiddenDays: [ 0, 6 ], // hide weekends
			allDaySlot: false, //allday 꺼주는거
			weekNumbers:  false,
			 
			
			views: {
				
				agendaMusicschoolDay: {
				type: 'agenda',
				duration: { days: 6 }, //Mon - Fri 
				lang: "da",
				 
          //  buttonText: '5 day',
				}
			},
			firstDay: 1,  //make it monday start
			hiddenDays: [ 0, 6 ], // hide weekends
			
			defaultView: 'agendaMusicschoolDay',


		

			
			
			allDaySlot: false, //allday 꺼주는거
			weekNumbers:  false,
			
			minTime: "08:00:00", //showing only the hours
			maxTime: "20:00:00",
			
			businessHours: //구분해주는거 only the business hours
			{
            start: '08:00', 
            end: '20:00',
            dow: [ 1, 2, 3, 4, 5, ]
			},
			
			
			
			
			eventLimit: true, // allow "more" link when too many events
			

		});

	
	

	});

</script>
<style>

		
	#wrap { <!-- Page of the content; 해당페이지 포괄된 것 -->
		width: 600px;
		margin: 0 auto;
	}


	#calendar {  <!--Width of Calendar; 캘린더 넓이-->
		float: right;
		width: 900px;
	}

</style>
</head>
<body>

 <script type="text/javascript">    //resize해주는 아주 소중한 함수 ㅠㅠ
   $(document).ready(function(){
   $('.wrap').css('width', $(window).width() - 50 );
   $('.wrap').css('height', $(window).height() - 50 );
   $(window).resize(function() {
        $('.wrap').css('width', $(window).width() - 50 );
        $('.wrap').css('height', $(window).height() - 50 );
   });
}); 

</script>

	<div id='wrap'>


		<div id='calendar'></div>

		<div style='clear:both'></div>


	</div>
</body>
</html>
