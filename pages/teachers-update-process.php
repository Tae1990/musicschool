<?php
 include "../modules/database.php"; //include the database connection
 include "headerPage.php";
?>
<?php
 //retrieve the data that was entered into the form fields using the $_POST array

 $loginID = $_POST['loginID'];
 $firstName = $_POST['firstName'];
 $lastName = $_POST['lastName'];
 $dateOfBirth = $_POST['dateOfBirth'];
 $address = $_POST['address'];
 $gender = $_POST['gender'];
 $phoneNumber = $_POST['phoneNumber'];
 $mobileNumber = $_POST['mobileNumber'];
 $email = $_POST['email'];
 $faceBook = $_POST['faceBook'];
 
 $stmt = $conn->prepare("UPDATE teachers SET
 firstName='$firstName', lastName='$lastName',
 dateOfBirth='$dateOfBirth',gender='$gender',
 mobileNumber='$mobileNumber',faceBook='$faceBook',
 email='$email', address='$address',
 phoneNumber='$phoneNumber' WHERE loginID = ". $loginID);
 $stmt->execute();

 if($stmt){
 $msg = 'Teacher updated successfully, You are redirecting in 3 seconds.'; 
 print_r ($msg);
 header("refresh:3;http://www.ifb29963musicschool.com/pages/ownerPage.php");
 }

 else{
 $msg = 'An error occurred. teacher not updated.'; 
 print_r ($msg);
 header("refresh:3;http://www.ifb29963musicschool.com/pages/ownerPage.php");
 }
?>
