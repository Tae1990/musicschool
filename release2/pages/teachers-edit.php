<?php
 include "../modules/database.php"; //include the database connection
?>

<?php
 $loginID = $_GET['loginID'];
 $stmt = $conn->prepare("SELECT * from teachers WHERE loginID = " . $loginID);

 $stmt->execute();
 $row = $stmt->fetch(PDO::FETCH_ASSOC)

?>

<!-- create a table to store the customer's data and retrieve the value of each column
in the row for the customer from the database -->
<form action="teachers-update-process.php" method="post">

 <div>
 <label>First Name: </label>
 <input id="firstName" type="text" name="firstName" value="<?php
echo $row['firstName'] ?>" />
 </div>

 <div>
 <label>Last Name: </label>
 <input id="lastName" type="text" name="lastName" value="<?php
echo $row['lastName'] ?>" />
 </div>

 <div>
 <label>Date of birth: </label>
 <input id="dateOfBirth" type="text" name="dateOfBirth" value="<?php echo
 $row['dateOfBirth'] ?>" />
 </div>

 <div>
 <label>Address: </label>
 <input id="address" type="text" name="address" value="<?php echo
 $row['address'] ?>" />
 </div>

 <div>
 <label>Gender: </label>
 <input id="gender" type="text" name="gender" value="<?php echo
 $row['gender'] ?>" />
 </div>

 <div>
 <label>Phone Number: </label>
 <input id="phoneNumber" type="text" name="phoneNumber" value="<?php echo
 $row['phoneNumber'] ?>" />
 </div>

 <div>
 <label>Mobile Phone Number: </label>
 <input id="mobileNumber" type="text" name="mobileNumber" value="<?php echo
 $row['mobileNumber'] ?>" />
 </div>

 <div>
 <label>Email: </label>
 <input id="email" type="text" name="email" value="<?php echo
 $row['email'] ?>" />
 </div>

 <div>
 <label>Facebook: </label>
 <input id="faceBook" type="text" name="faceBook" value="<?php
 echo $row['faceBook'] ?>" />
 </div>

 <div>
 <label>Login ID: </label>
 <input id="loginID" type="text" name="loginID" value="<?php
 echo $row['loginID'] ?>" />
 </div>

 </div>
 <div class="spacer">

 <input type="submit" value="Update Details" />
 </div>
</form>
