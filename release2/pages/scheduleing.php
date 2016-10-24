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


	var currentMousePos = {
	    x: -1,
	    y: -1
	};
		jQuery(document).on("mousemove", function (event) {
        currentMousePos.x = event.pageX;
        currentMousePos.y = event.pageY;
    });

		/* initialize the external events
		-----------------------------------------------------------------*/

		$('#external-events .fc-event').each(function() {

			// store data so the calendar knows to render an event upon drop
			$(this).data('event', {
				title: $.trim($(this).text()), // use the element's text as the event title
				stick: true // maintain when user navigates (see docs on the renderEvent method)
			});

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});


		/* initialize the calendar
		-----------------------------------------------------------------*/

		//events: JSON.parse(json_events),
			//events: [{"id":"14","title":"New Event","start":"2015-01-24T16:00:00+04:00","allDay":false}],
			//utc: true,
			//header: {
				//left: 'prev,next today',
				//center: 'title',
				//right: 'month,agendaWeek,agendaDay'
			//},
			//editable: true,
			//droppable: true, 
			//slotDuration: '00:30:00',
		
		
		
		
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
				duration: { days: 7 }, //Mon - Fri 
				lang: "da",
				 
          //  buttonText: '5 day',
				}
			},
			firstDay: 1,  //make it monday start
			hiddenDays: [ 0, 6 ], // hide weekends
			
			defaultView: 'agendaMusicschoolDay',


		
			 events222: [
			 
			 { //여기가 리피트 되는부분!! ☆★
				title:"Flute",
				start: '10:00', // a start time 
				end: '12:00', // an end time 
				color: 'gray',
				//rendering: 'background',
				dow: [ 1 ] // Repeat monday 
			},
			
			{ //여기가 리피트 되는부분!! ☆★
				title:"Temberin",
				start: '13:00', // a start time 
				end: '15:00', // an end time 
				dow: [ 2 ] // Repeat Tuesday
			}
			
			
			],


			
			
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
			
			
 
			
			eventReceive: function(event){ //여기서 데이터베이스에 새로 집어넣음.
				var title = event.title;
				var start = event.start.format("YYYY-MM-DD[T]HH:mm:SS"); //여기서 startdate형식을 넣어줌. ★☆★☆
				$.ajax({
		    		url: 'process.php',
		    		data: 'type=new&title='+title+'&startdate='+start+'&zone='+zone,
		    		type: 'POST',
		    		dataType: 'json',
		    		success: function(response){
		    			event.id = response.eventid;
		    			$('#calendar').fullCalendar('updateEvent',event);
		    		},
		    		error: function(e){
		    			console.log(e.responseText);

		    		}
		    	});
				$('#calendar').fullCalendar('updateEvent',event);
				console.log(event);
			},
			eventDrop: function(event, delta, revertFunc) { //날짜와 시간을 드래그로 옮기는겼을때 수정되는거
		        var title = event.title;
		        var start = event.start.format();
		        var end = (event.end == null) ? start : event.end.format();
		        $.ajax({
					url: 'process.php',
					data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
					type: 'POST',
					dataType: 'json',
					success: function(response){
						if(response.status != 'success')		    				
						revertFunc();
					},
					error: function(e){		    			
						revertFunc();
						alert('Error processing your request: '+e.responseText);
					}
				});
		    },
		    eventClick: function(event, jsEvent, view) { //이벤트를 눌렀을때 이벤트네임 title 수정하는거임.
		    	console.log(event.id);
		          var title = prompt('Event Title:', event.title, { buttons: { Ok: true, Cancel: false} });
		          if (title){
		              event.title = title;
		              console.log('type=changetitle&title='+title+'&eventid='+event.id);
		              $.ajax({
				    		url: 'process.php',
				    		data: 'type=changetitle&title='+title+'&eventid='+event.id,
				    		type: 'POST',
				    		dataType: 'json',
				    		success: function(response){	
				    			if(response.status == 'success')			    			
		              				$('#calendar').fullCalendar('updateEvent',event);
				    		},
				    		error: function(e){
				    			alert('Error processing your request: '+e.responseText);
				    		}
				    	});
		          }
			},
			eventResize: function(event, delta, revertFunc) { //에러잡는 함수인거같음.
				console.log(event);
				var title = event.title;
				var end = event.end.format();
				var start = event.start.format();
		        $.ajax({
					url: 'process.php',
					data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
					type: 'POST',
					dataType: 'json',
					success: function(response){
						if(response.status != 'success')		    				
						revertFunc();
					},
					error: function(e){		    			
						revertFunc();
						alert('Error processing your request: '+e.responseText);
					}
				});
		    },
			eventDragStop: function (event, jsEvent, ui, view) { //여기서 이벤트를 지우는거. 휴지통함수.
			    if (isElemOverDiv()) {
			    	var con = confirm('Are you sure to delete this event permanently?');
			    	if(con == true) {
						$.ajax({
				    		url: 'process.php',
				    		data: 'type=remove&eventid='+event.id,
				    		type: 'POST',
				    		dataType: 'json',
				    		success: function(response){
				    			console.log(response);
				    			if(response.status == 'success'){
				    				$('#calendar').fullCalendar('removeEvents');
            						getFreshEvents();
            					}
				    		},
				    		error: function(e){	
				    			alert('Error processing your request: '+e.responseText);
				    		}
			    		});
					}   
				}
			}
		});

	function getFreshEvents(){ //이 함수에서 process로 보냄.   이거 없어도 되는데??
		$.ajax({
			url: 'process.php',
	        type: 'POST', // Send post data
	        data: 'type=fetch',
	        async: false,
	        success: function(s){   //'s'라는 파라미터에 넣음
	        	freshevents = s;
	        }
		});
		$('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));
	}


	function isElemOverDiv() {
        var trashEl = jQuery('#trash');

        var ofs = trashEl.offset();

        var x1 = ofs.left;
        var x2 = ofs.left + trashEl.outerWidth(true);
        var y1 = ofs.top;
        var y2 = ofs.top + trashEl.outerHeight(true);

        if (currentMousePos.x >= x1 && currentMousePos.x <= x2 &&
            currentMousePos.y >= y1 && currentMousePos.y <= y2) {
            return true;
        }
        return false;
    }

	});

</script>
<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
	}

	#trash{
		width:32px;
		height:32px;
		float:left;
		padding-bottom: 15px;
		position: relative;
	}
		
	#wrap {
		width: 850px;
		margin: 0 auto;
	}
		
	#external-events {
		float: left;
		width: 100px;
		padding: 10px;
		border: 1px solid #ccc;
		background: #eee;
		text-align: left;
	}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
	}
		
	#external-events .fc-event {
		margin: 10px 0;
		cursor: pointer;
		
	}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 8px;
		color: #666;
	}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
	}

	#calendar {
		float: left;
		margin: 20px;
		width: 500px; <!-- width of calendar -->
		
	}

</style>
</head>
<body>
	<div id='wrap'>

		<div id='external-events'>
			<h4>Drag & drop the music instruments!</h4>
			<div class='fc-event'>Piano</div>
			<div class='fc-event'>Guitar</div>
			<div class='fc-event'>Chello</div>
			<div class='fc-event'>Violin</div>
			<div class='fc-event'>Drum</div>
			<p>
				<img src="assets/img/trashcan.png" id="trash" alt="">
			</p>
		</div>

		<div id='calendar'></div>

		<div style='clear:both'></div>


	</div>
</body>
</html>
