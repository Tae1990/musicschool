<div class="registerPage">
<form action="#" method="post">

<fieldset>
<legend>Personal detail:</legend>
<label>user name : </label><input name="userName" type="text"  size="45" maxlength="45" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="User name should be between 2 and 20 digit"><br>
<label>password : </label><input name="password" type="password"  size="45" maxlength="45" required pattern=".{6,}" title="Six or more"><br>
<label>first name : </label><input name="firstName" type="text" size="45" maxlength="45" pattern="[A-Za-z]*" required title="Only character please"><br>
<label>last name : </label><input name="lastName" type="text"  size="45" maxlength="45" pattern="[A-Za-z]*" required title="Only character please"><br>
<label>gender : </label><input name="gender" type="text"  size="45" maxlength="255" required><br>
<label>dateOfBirth : </label><input name="dateOfBirth" type="date"  required ><br>
<label>phone number : </label><input name="phoneNumber" type="text" pattern="[0-9]{10}" size="45" maxlength="10" required title="Only 10 digit number"><br>
<label>mobile number : </label><input name="mobileNumber" type="text" pattern="[0-9]{10}" size="45" maxlength="10" title="Only 10 digit number"><br>
<label>address : </label><input name="address" type="text"  size="45" maxlength="255" required><br>
<label>email : </label><input name="email" type="email"  size="45" maxlength="45" required><br>
<label>facebook : </label><input name="faceBook" type="email"  size="45" maxlength="45"><br>
</fieldset>

<fieldset>
<legend>Parent's detail:</legend>
<label>first name : </label><input name="parentFirstName" type="text" size="45" maxlength="45" pattern="[A-Za-z]*" required title="Only character please"><br>
<label>last name : </label><input name="parentLastName" type="text"  size="45" maxlength="45" pattern="[A-Za-z]*" required title="Only character please"><br>
<label>phone number : </label><input name="parentPhoneNumber" type="text" pattern="[0-9]{10}" size="45" maxlength="10" required title="Only 10 digit number"><br>
               <button type="submit" class="register"> Register</button>
</fieldset>
</form>
 <?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$userName = !empty($_POST['userName']) ? test_user_input(($_POST['userName'])) : null;
	$password = !empty($_POST['password']) ? test_user_input(($_POST['password'])) : null;
	$firstName = !empty($_POST['firstName']) ? test_user_input(($_POST['firstName'])) : null;
	$lastName = !empty($_POST['lastName']) ? test_user_input(($_POST['lastName'])) : null;
	$gender = !empty($_POST['gender']) ? test_user_input(($_POST['gender'])) : null;
	$dateOfBirth = !empty($_POST['dateOfBirth']) ? test_user_input(($_POST['dateOfBirth'])) : null;
	$phoneNumber = !empty($_POST['phoneNumber']) ? test_user_input(($_POST['phoneNumber'])) : null;
	$mobileNumber = !empty($_POST['mobileNumber']) ? test_user_input(($_POST['mobileNumber'])) : null;
    $address = !empty($_POST['address']) ? test_user_input(($_POST['address'])) : null;
	$email = !empty($_POST['email']) ? test_user_input(($_POST['email'])) : null;
	$faceBook = !empty($_POST['faceBook']) ? test_user_input(($_POST['faceBook'])) : null;
	$parentFirstName = !empty($_POST['parentFirstName']) ? test_user_input(($_POST['parentFirstName'])) : null;
	$parentLastName = !empty($_POST['parentLastName']) ? test_user_input(($_POST['parentLastName'])) : null;
	$parentPhoneNumber = !empty($_POST['parentPhoneNumber']) ? test_user_input(($_POST['parentPhoneNumber'])) : null;
	
	$password_hash = password_hash($password, PASSWORD_DEFAULT);
	try{
		//insert into logins table
		$stmt2 = $conn->prepare("INSERT INTO logins(role, permission, userName, password)
		                        VALUES(:role, :permission, :userName, :password)");
	    $student = 'student';
		$permission = 'off';
		$stmt2->bindParam(':role', $student);
		$stmt2->bindParam(':permission', $permission);
	    $stmt2->bindParam(':userName', $userName);
	    $stmt2->bindParam(':password', $password_hash);
		$stmt2->execute();
		$newId=$conn->lastInsertId();
		//insert into users table
		$stmt3 = $conn->prepare("INSERT INTO students(firstName, lastName, dateOfBirth, address, gender, phoneNumber, mobileNumber, email, faceBook, loginID, grade)
		                        VALUES(:firstName, :lastName, :dateOfBirth, :address, :gender, :phoneNumber, :mobileNumber, :email, :faceBook, :loginID, :grade)");
		$grade = 'new';
		$stmt3->bindParam(':firstName', $firstName);
	    $stmt3->bindParam(':lastName', $lastName);
		$stmt3->bindParam(':dateOfBirth', $dateOfBirth);
		$stmt3->bindParam(':address', $address);
	    $stmt3->bindParam(':gender', $gender);
	    $stmt3->bindParam(':phoneNumber', $phoneNumber);
	    $stmt3->bindParam(':mobileNumber', $mobileNumber);
	    $stmt3->bindParam(':email', $email);
		$stmt3->bindParam(':faceBook', $faceBook);
		$stmt3->bindParam(':loginID', $newId);
		$stmt3->bindParam(':grade', $grade);
		$stmt3->execute();
		$newId1=$conn->lastInsertId();
		//insert into logins table
		$stmt4 = $conn->prepare("INSERT INTO parents(studentID, parentFirstName, parentLastName, parentPhoneNumber)
		                        VALUES(:studentID, :parentFirstName, :parentLastName, :parentPhoneNumber)");
		$stmt4->bindParam(':studentID', $newId1);
		$stmt4->bindParam(':parentFirstName', $parentFirstName);
	    $stmt4->bindParam(':parentLastName', $parentLastName);
	    $stmt4->bindParam(':parentPhoneNumber', $parentPhoneNumber);
		$stmt4->execute();
	  echo "New records created successfully";
	}
	catch(PDOException $e)
	{
	echo "Error: " . $e->getMessage();
	}
}
	
	
?>
</div>