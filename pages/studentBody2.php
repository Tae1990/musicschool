<div class="adminPage">

<?php
if(!isset($_POST["changed_firstName"])){
}else{
  $username=$_SESSION['userName'];

  $sql="SELECT loginID FROM logins WHERE userName ='$username'";
  $result=$conn->query($sql);
  $row=$result->fetch();
  $loginID_from_loginsTable = $row['loginID'];
  $changed_name=$_POST['changed_firstName'];
  $conn->query("UPDATE students SET firstName='$changed_name' WHERE loginID ='$loginID_from_loginsTable'");
  echo '<br>';
}

if(!isset($_POST["changed_lastName"])){
}else{
  $username=$_SESSION['userName'];

  $sql="SELECT loginID FROM logins WHERE userName ='$username'";
  $result=$conn->query($sql);
  $row=$result->fetch();
  $loginID_from_loginsTable = $row['loginID'];
  $changed_name=$_POST['changed_lastName'];
  $conn->query("UPDATE students SET lastname='$changed_name' WHERE loginID ='$loginID_from_loginsTable'");
  echo '<br>';
}



if(!isset($_POST["changed_dateOfBirth"])){
}else{
  $username=$_SESSION['userName'];

  $sql="SELECT loginID FROM logins WHERE userName ='$username'";
  $result=$conn->query($sql);
  $row=$result->fetch();
  $loginID_from_loginsTable = $row['loginID'];
  $changed_name=$_POST['changed_dateOfBirth'];
  $conn->query("UPDATE students SET dateOfBirth='$changed_name' WHERE loginID ='$loginID_from_loginsTable'");
  echo '<br>';
}


if(!isset($_POST["changed_address"])){
}else{
  $username=$_SESSION['userName'];

  $sql="SELECT loginID FROM logins WHERE userName ='$username'";
  $result=$conn->query($sql);
  $row=$result->fetch();
  $loginID_from_loginsTable = $row['loginID'];
  $changed_name=$_POST['changed_address'];
  $conn->query("UPDATE students SET address='$changed_name' WHERE loginID ='$loginID_from_loginsTable'");
  echo '<br>';
}


if(!isset($_POST["changed_mobileNumber"])){
}else{
  $username=$_SESSION['userName'];

  $sql="SELECT loginID FROM logins WHERE userName ='$username'";
  $result=$conn->query($sql);
  $row=$result->fetch();
  $loginID_from_loginsTable = $row['loginID'];
  $changed_name=$_POST['changed_mobileNumber'];
  $conn->query("UPDATE students SET mobileNumber='$changed_name' WHERE loginID ='$loginID_from_loginsTable'");
  echo '<br>';
}


if(!isset($_POST["changed_phoneNumber"])){
}else{
  $username=$_SESSION['userName'];

  $sql="SELECT loginID FROM logins WHERE userName ='$username'";
  $result=$conn->query($sql);
  $row=$result->fetch();
  $loginID_from_loginsTable = $row['loginID'];
  $changed_name=$_POST['changed_phoneNumber'];
  $conn->query("UPDATE students SET phoneNumber='$changed_name' WHERE loginID ='$loginID_from_loginsTable'");
  echo '<br>';
}


if(!isset($_POST["changed_email"])){
}else{
  $username=$_SESSION['userName'];

  $sql="SELECT loginID FROM logins WHERE userName ='$username'";
  $result=$conn->query($sql);
  $row=$result->fetch();
  $loginID_from_loginsTable = $row['loginID'];
  $changed_name=$_POST['changed_email'];
  $conn->query("UPDATE students SET email='$changed_name' WHERE loginID ='$loginID_from_loginsTable'");
  echo '<br>';
}

if(!isset($_POST["changed_facebook"])){
}else{
  $username=$_SESSION['userName'];

  $sql="SELECT loginID FROM logins WHERE userName ='$username'";
  $result=$conn->query($sql);
  $row=$result->fetch();
  $loginID_from_loginsTable = $row['loginID'];
  $changed_name=$_POST['changed_facebook'];
  $conn->query("UPDATE students SET facebook='$changed_name' WHERE loginID ='$loginID_from_loginsTable'");
  echo '<br>';
}

?>

<?php
$username=$_SESSION['userName'];
$sql="SELECT loginID FROM logins WHERE userName ='$username'";
$result=$conn->query($sql);
$row=$result->fetch();
$loginID_from_loginsTable = $row['loginID'];
$sql2="SELECT firstName FROM students WHERE loginID ='$loginID_from_loginsTable'";
$result2=$conn->query($sql2);
$row2=$result2->fetch();
echo "Your first Name is ".$row2['firstName'];
?>
<form action="studentPage.php" method="post">
  Insert the name you want to change:<input type="text" name="changed_firstName"
                                    pattern="[A-Za-z]+" required title="Only character please">
  <input type="submit" value="Click"><br>
</form><br><br>



<?php
$username=$_SESSION['userName'];
$sql="SELECT loginID FROM logins WHERE userName ='$username'";
$result=$conn->query($sql);
$row=$result->fetch();
$loginID_from_loginsTable = $row['loginID'];
$sql2="SELECT lastName FROM students WHERE loginID ='$loginID_from_loginsTable'";
$result2=$conn->query($sql2);
$row2=$result2->fetch();
echo "Your last Name is ".$row2['lastName'];
?>
<form action="studentPage.php" method="post">
 Insert the name you want to change:<input type="text" name="changed_lastName"
                                    pattern="[A-Za-z]+" required title="Only character please">
 <input type="submit" value="Click"><br>
</form><br><br>


<?php
$username=$_SESSION['userName'];
$sql="SELECT loginID FROM logins WHERE userName ='$username'";
$result=$conn->query($sql);
$row=$result->fetch();
$loginID_from_loginsTable = $row['loginID'];
$sql2="SELECT dateOfBirth FROM students WHERE loginID ='$loginID_from_loginsTable'";
$result2=$conn->query($sql2);
$row2=$result2->fetch();
echo "Your birday is ".$row2['dateOfBirth'];
echo '<br>';
?>
<form action="studentPage.php" method="post">
 Insert the birth day you want to change:<input type="text" name="changed_dateOfBirth" required
                                          pattern="[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]"
                                          requred title="Follow this format 1987-09-17">
<input type="submit" value="Click"><br>
</form><br><br>

<?php
$username=$_SESSION['userName'];
$sql="SELECT loginID FROM logins WHERE userName ='$username'";
$result=$conn->query($sql);
$row=$result->fetch();
$loginID_from_loginsTable = $row['loginID'];
$sql2="SELECT address FROM students WHERE loginID ='$loginID_from_loginsTable'";
$result2=$conn->query($sql2);
$row2=$result2->fetch();
echo "Your address is ".$row2['address'];
echo '<br>';
?>
<form action="studentPage.php" method="post">
 Insert the address you want to change:<input type="text" name="changed_address" required>
 <input type="submit" value="Click"><br>
</form><br><br>



<?php
$username=$_SESSION['userName'];
$sql="SELECT loginID FROM logins WHERE userName ='$username'";
$result=$conn->query($sql);
$row=$result->fetch();
$loginID_from_loginsTable = $row['loginID'];
$sql2="SELECT mobileNumber FROM students WHERE loginID ='$loginID_from_loginsTable'";
$result2=$conn->query($sql2);
$row2=$result2->fetch();
echo "Your mobile-number is ".$row2['mobileNumber'];
echo '<br>';
?>
<form action="studentPage.php" method="post">
 Insert the your mobile-number you want to change:<input type="text"
                                            required title="Only 10 digit number"
                                            pattern="[0-9]+" name="changed_mobileNumber"
                                            maxlength="10" minlength='8'>
 <input type="submit" value="Click"><br>
</form><br><br>



<?php
$username=$_SESSION['userName'];
$sql="SELECT loginID FROM logins WHERE userName ='$username'";
$result=$conn->query($sql);
$row=$result->fetch();
$loginID_from_loginsTable = $row['loginID'];
$sql2="SELECT phoneNumber FROM students WHERE loginID ='$loginID_from_loginsTable'";
$result2=$conn->query($sql2);
$row2=$result2->fetch();
echo "Your parent's phoneNumber is ".$row2['phoneNumber'];
echo '<br>';
?>
<form action="studentPage.php" method="post">
 Insert the your mobile-number you want to change:<input type="text"
                                            required title="Only 10 digit number"
                                            pattern="[0-9]+" name="changed_phoneNumber"
                                            maxlength="10" minlength='8'>
 <input type="submit" value="Click"><br>
</form><br><br>


<?php
$username=$_SESSION['userName'];
$sql="SELECT loginID FROM logins WHERE userName ='$username'";
$result=$conn->query($sql);
$row=$result->fetch();
$loginID_from_loginsTable = $row['loginID'];
$sql2="SELECT email FROM students WHERE loginID ='$loginID_from_loginsTable'";
$result2=$conn->query($sql2);
$row2=$result2->fetch();
echo "Your e-mail is ".$row2['email'];
echo '<br>';
?>
<form action="studentPage.php" method="post">
 Insert e-mail you want to change:<input type="text" name="changed_email"
                                  pattern="[A-Za-z.0-9]+[@]+[A-Za-z0-9]+[.][A-Za-z0-9.]*" maxlength=50
                                  required title="ex>micheal@yahoo.co.kr" >
 <input type="submit" value="Click"><br>
</form><br><br>


<?php
$username=$_SESSION['userName'];
$sql="SELECT loginID FROM logins WHERE userName ='$username'";
$result=$conn->query($sql);
$row=$result->fetch();
$loginID_from_loginsTable = $row['loginID'];
$sql2="SELECT faceBook FROM students WHERE loginID ='$loginID_from_loginsTable'";
$result2=$conn->query($sql2);
$row2=$result2->fetch();
echo "Your facebook account is ".$row2['faceBook'];
echo '<br>';
?>
<form action="studentPage.php" method="post">
 Insert facebook account you want to change:<input type="text" name="changed_facebook"
                                             pattern="[A-Za-z.0-9]+[@]+[A-Za-z0-9]+[.][A-Za-z0-9.]*" maxlength=50
                                             required title="ex>micheal@facebook.com" >
 <input type="submit" value="Click"><br>
</form><br><br>









<?php
//echo $row['lastName'];
//echo '<br>';
//echo $row['address'];
//echo $row['firstName'];
 ?>
</div><!--mainimage-->
