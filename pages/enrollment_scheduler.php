<html>
<head>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


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

<body>
<table border='1'>
  <tr>
    <td valign="top">
      <div class='lessonTable'>

      <table>
        <tr>
          <td>list <br> Number</td>
          <td>Lesson Name</td>
          <td>Take this lesson</td>
        </tr>
      </table>
      <table id='myTable'>
        <tr>
          <td>1.</td>
          <td> Easy Piano Lesson:<br> Monday 9 Friday 14</td>
          <td>
            <input type="checkbox" name='myTable' onclick="check(this.value,this.name,this.id)" id="check1" value=1> <br>

          </td>
        </tr>
      </table>
      <table id='myTable2'>
        <tr>
          <td>2.</td>
          <td> Intermadiate Guitar:<br> Wed 8 Thursday 16</td>
          <td>
            <input type="checkbox" name='myTable2' onclick="check(this.value,this.name,this.id)" id="check2" value=2> <br>
          </td>
        </tr>
      </table>
      <table id='myTable3'>
        <tr>
          <td>3.</td>
          <td> Advanced Violin:<br> Thursday 10 Friday 10</td>
          <td>
            <input type="checkbox" name='myTable3' onclick="check(this.value,this.name,this.id)" id="check3" value=3> <br>
          </td>
        </tr>
      </table>

      <table id='myTable4'>
        <tr>
          <td>4.</td>
          <td> Advanced Funny Piano Class!!<br> Tuesday 14 Thursday 15</td>
          <td>
            <input type="checkbox" name='myTable4' onclick="check(this.value,this.name,this.id)" id="check4" value=4><br>
          </td>
        </tr>
      </table>
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
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
        </tr>
        <tr>
          <td class="time">09:00</td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
        </tr>
        <tr>
          <td class="time">10:00</td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
        </tr>
        <tr>
          <td class="time">11:00</td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
        </tr>
        <tr>
          <td class="time">12:00</td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
        </tr>
        <tr>
          <td class="time">13:00</td>
          <td class="lunch" colspan="5">Lunch</td>
        </tr>
        <tr>
          <td class="time">14:00</td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
        </tr>
        <tr>
          <td class="time">15:00</td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
        </tr>
        <tr>
          <td class="time">16:00</td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
          <td class="drop"></td>
        </tr>
      </table>
    </td>
  </tr>
</table>

</body>

<script>
var miniNum=0;
function tableCreate(lessonArr,tableID) {

        // create elements <table> and a <tbody>
        var tbl     = document.createElement("table");
        tbl.id='m'+miniNum;
        var tblBody = document.createElement("tbody");
        var row;
        var cell;
        // cells creation
        for (var j = 0; j <= 3; j++) {
            // table row creation
            row = document.createElement("tr");

            for (var i = 0; i < 2; i++) {
             cell = document.createElement("td");
             row.appendChild(cell);
            }
            //row added to end of table body
            tblBody.appendChild(row);
        }

        // append the <tbody> inside the <table>
        tbl.appendChild(tblBody);

        //From database and ajax, extract lesson data.
         // lessonArr 0,1,2,3,4 has each info !
        $('#'+tableID+' tr:eq(1) td:eq(1)').append(tbl);

        var cellText = document.createTextNode('Description');
        $('#'+tbl.id+' tr:eq(0) td:eq(1)').append(cellText);

        var cellText = document.createTextNode('Teacher name');
        $('#'+tbl.id+' tr:eq(1) td:eq(0)').append(cellText);

        var cellText = document.createTextNode('Start-end Date');
        $('#'+tbl.id+' tr:eq(2) td:eq(0)').append(cellText);

        var cellText = document.createTextNode('Cost');
        $('#'+tbl.id+' tr:eq(3) td:eq(0)').append(cellText);

        var cellText = document.createTextNode(lessonArr[0]+' '+lessonArr[1]);
        $('#'+tbl.id+' tr:eq(1) td:eq(1)').append(cellText);

        var cellText = document.createTextNode(lessonArr[2]+'~'+lessonArr[3]);
        $('#'+tbl.id+' tr:eq(2) td:eq(1)').append(cellText);

        var cellText = document.createTextNode(lessonArr[4]);
        $('#'+tbl.id+' tr:eq(3) td:eq(1)').append(cellText);

        // tbl border attribute to
        tbl.setAttribute("border", "2");
        miniNum++;
} // end function tableCreate

function createCell(cell, text, style) {
    var div = document.createElement('div'); // create DIV element
    cell.appendChild(div);                   // append DIV to the table cell
}

function check(val,tableID,check){

  var lessonID=val;

  var ch1=document.getElementById(check).checked;
  if(ch1){

    //change time-table colour after an event!
    if(lessonID==1){
      $('#timeTable tr:eq(2) td:eq(1)').addClass('assigned');
      $('#timeTable tr:eq(7) td:eq(5)').addClass('assigned');
      //Additionally, change color of lesson table including 'lesson Name' colour after an event!
      $('#myTable tr:eq(0)').addClass('assigned5');
    }else if (lessonID==2){
      $('#timeTable tr:eq(1) td:eq(3)').addClass('assigned2');
      $('#timeTable tr:eq(9) td:eq(4)').addClass('assigned2');
      //Additionally
      $('#myTable2 tr:eq(0)').addClass('assigned5');
    }else if (lessonID==3){
      $('#timeTable tr:eq(3) td:eq(4)').addClass('assigned3');
      $('#timeTable tr:eq(3) td:eq(5)').addClass('assigned3');
      //Additionally
      $('#myTable3 tr:eq(0)').addClass('assigned5');
    }else{
      $('#timeTable tr:eq(7) td:eq(2)').addClass('assigned4');
      $('#timeTable tr:eq(8) td:eq(4)').addClass('assigned4');
      //Additionally
      $('#myTable4 tr:eq(0)').addClass('assigned5');
    }



    var table = document.getElementById(tableID);
    var row = table.insertRow(table.rows.length);
    //alert('tabls rows '+table.columns.length);
    //var cell1 = row.insertCell(0);
    //var cell2 = row.insertCell(1);
    for (i = 0; i < table.rows[0].cells.length; i++) {
        createCell(row.insertCell(i), i, 'row');
    }

    // Insert pictures in lesson table depending on lesson ID
    var pic = document.createElement("IMG");
    if(lessonID==1){
      pic.setAttribute("src", "piano.jpg");
      pic.setAttribute("width", "250");
      pic.setAttribute("height", "200");
      pic.setAttribute("alt", "The Pulpit Rock");
    }else if(lessonID==2){
      pic.setAttribute("src", "guitar.jpg");
      pic.setAttribute("width", "250");
      pic.setAttribute("height", "200");
      pic.setAttribute("alt", "The Pulpit Rock");
    }else if(lessonID==3){
      pic.setAttribute("src", "violin.jpg");
      pic.setAttribute("width", "250");
      pic.setAttribute("height", "200");
      pic.setAttribute("alt", "The Pulpit Rock");
    }else{
      pic.setAttribute("src", "piano2.jpg");
      pic.setAttribute("width", "250");
      pic.setAttribute("height", "200");
      pic.setAttribute("alt", "The Pulpit Rock");
    }
    var numOfRows=table.rows.length;
    $('#'+tableID+' tr:eq('+(numOfRows-1)+') td:eq(0)').append(pic);

    //From database, bring data to fill mini-table
    // this is php formed file so call ajax to connect js and php.
    var lessonArr=[];
    $.ajax({
       url:'firstMiniTable.php',
       type:'post',
       dataType:'json',
       data: {lessonID:lessonID},
       async: false,
       success:function(data){
         teacherFirstName=data.teacherFirstName;
         teacherLastName=data.teacherLastName;
         teacherStartDate=data.teacherStartDate;
         teacherEndDate=data.teacherEndDate;
         lessonCost=data.lessonCost;

         lessonArr.push(teacherFirstName);
         lessonArr.push(teacherLastName);
         lessonArr.push(teacherStartDate);
         lessonArr.push(teacherEndDate);
         lessonArr.push(lessonCost);
       }
     });
     //alert('this info is '+ lessonArr[0]);

    // Mini-table in the table
    tableCreate(lessonArr,tableID);

    //After users clicked the button, all table size should be changed!
    $('.lessonTable').addClass('changed');

  }else{ // end if
    //alert('this is unchecked!')
    var tbl = document.getElementById(tableID); // table reference
    tbl.deleteRow(1)

    // When unchecked, remove the colour in mini-table and lesson table.
    if(lessonID==1){
      $('#timeTable tr:eq(2) td:eq(1)').removeClass('assigned');
      $('#timeTable tr:eq(7) td:eq(5)').removeClass('assigned');
      //Additionally, change color of lesson table including 'lesson Name' colour after an event!
      $('#myTable tr:eq(0)').removeClass('assigned5');
    }else if (lessonID==2){
      $('#timeTable tr:eq(1) td:eq(3)').removeClass('assigned2');
      $('#timeTable tr:eq(9) td:eq(4)').removeClass('assigned2');
      //Additionally
      $('#myTable2 tr:eq(0)').removeClass('assigned5');
    }else if (lessonID==3){
      $('#timeTable tr:eq(3) td:eq(4)').removeClass('assigned3');
      $('#timeTable tr:eq(3) td:eq(5)').removeClass('assigned3');
      //Additionally
      $('#myTable3 tr:eq(0)').removeClass('assigned5');
    }else{
      $('#timeTable tr:eq(7) td:eq(2)').removeClass('assigned4');
      $('#timeTable tr:eq(8) td:eq(4)').removeClass('assigned4');
      //Additionally
      $('#myTable4 tr:eq(0)').removeClass('assigned5');
    }
  }
} // end function

</script>

</div>
</body>

</html>
