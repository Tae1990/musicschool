<div class="registerPage">
<form action="#" method="post">




<form name="htmlform" method="post" action="html_form_send.php">
  <table width="450px">
  </tr>
 

  <tr>
    <td valign="top">
      <label for="userName"><h4><strong>user name:</strong></label>
      </td>
      <td valign="top">
        <input name="userName" type="text"  size="45" maxlength="45" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="User name should be between 2 and 20 digit">
      </td>
    </tr>	  
    
    <tr>
      <td valign="top">
        <label for="password"><h4><strong>password:</strong></label>
        </td>
        <td valign="top">
         <input name="password" type="password"  size="45" maxlength="45" required pattern=".{6,}" title="Six or more">
        </td>
      </tr>	  
 
      
      <tr>
        <td valign="top">
          <label for="firstName">first name:</label>
        </td>
        <td valign="top">
          <input name="firstName" type="text" size="45" maxlength="45" pattern="[A-Za-z]*" required title="Only character please">
        </td>
      </tr>
      
      
      <tr>
        <td valign="top"">
          <label for="lastName">last name:</label>
        </td>
        <td valign="top">
          <input name="lastName" type="text"  size="45" maxlength="45" pattern="[A-Za-z]*" required title="Only character please">
        </td>
      </tr>
      
      <tr>
        <td valign="top">
          <label for="telephone">gender:</label>
        </td>
        <td valign="top">
          <input name="gender" type="text"  size="45" maxlength="255" required>
        </td>
      </tr>
      
      
      <tr>
        <td valign="top">
          <label for="dateOfBirth">dateOfBirth:</label>
        </td>
        <td valign="top">
          <input name="dateOfBirth" type="date"  required >
        </td>
      </tr>
      
      <tr>
        <td valign="top">
          <label for="phoneNumber">Homephone number:</label>
        </td>
        <td valign="top">
          <input name="phoneNumber" type="text" pattern="[0-9]{10}" size="45" maxlength="10" required title="Only 10 digit number">
        </td>
      </tr>
      
      
      <tr>
        <td valign="top">
          <label for="mobileNumber">mobile number:</label>
        </td>
        <td valign="top">
          <input name="mobileNumber" type="text" pattern="[0-9]{10}" size="45" maxlength="10" required title="Only 10 digit number"><br>
        </td>
      </tr>
      
   
      <tr>
        <td valign="top">
          <label for="address">address:</label>
        </td>
        <td valign="top">
         <input name="address" type="text"  size="45" maxlength="255" required>
        </td>
      </tr>
      
      
      <tr>
        <td valign="top">
          <label for="email">email:</label>
        </td>
        <td valign="top">
        <input name="email" type="email"  size="45" maxlength="45" required>
        </td>
      </tr>
      
      
      <tr>
        <td valign="top">
          <label for="faceBook">facebook</label>
        </td>
        <td valign="top">
          <input name="faceBook" type="email"  size="45" maxlength="45" required>
        </td>
      </tr>
      
      

    </tr>
    <tr>
      <td colspan="2" style="text-align:center">
         <button type="submit" class="register"> Register</button>
      </td>
    </tr>
  </table>
</form>

             
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
		$stmt3 = $conn->prepare("INSERT INTO students(firstName, lastName, dateOfBirth, address, gender, phoneNumber, mobileNumber, email, faceBook, loginID)
		                        VALUES(:firstName, :lastName, :dateOfBirth, :address, :gender, :phoneNumber, :mobileNumber, :email, :faceBook, :loginID)");
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
		$stmt3->execute();
	  echo "New records created successfully";
	}
	catch(PDOException $e)
	{
	echo "Error: " . $e->getMessage();
	}
}
	
	
?>
</div>