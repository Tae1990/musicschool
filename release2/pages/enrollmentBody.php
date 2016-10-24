
    <div id="wrapper">



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Enrollment
                            <small>Student</small>
                        </h1> 
                    </div>
                </div>
                <!-- /.row -->
<html>
<head>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


<div class="adminPage">

</head>

<?php
$userName=$_SESSION['userName'];
$sql = "SELECT students.studentID FROM students,logins
        WHERE students.loginID=logins.loginID AND logins.userName='$userName'";
$result=$conn->query($sql);
$row=$result->fetch();
$studentID=$row['studentID'];echo '<br>';

$sql="SELECT * FROM contracts inner join
     (select lessonID,lessonType from lessons) as newTable
     where studentID='$studentID' and newTable.lessonID=contracts.lessonID";

$result2=$conn->query($sql);
?>

<?php
while($row=$result2->fetch(PDO::FETCH_ASSOC)){
 ?>
<input type="button" name="<?php echo $row['lessonID'];?>" value="<?php echo $row['lessonType']?>" onclick="choiceClick(this.value,this.name)" id="open_same_window"/>
<?php
}
 ?>
<script>
function choiceClick(val,val2){
  var lessonType=val;
  var lessonID=val2;
  window.location='/pages/afterEnrollment.php?lessonID='+lessonID;
}
</script>

          </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

