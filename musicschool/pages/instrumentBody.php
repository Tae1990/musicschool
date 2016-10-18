<?php 
 if (!isset($_SESSION['login']) and !isset($_SESSION['error']))
 {       
	echo(
          "<div class=\"login\">
           <form action=\"../modules/login.php\" method=\"post\">
           <div class=\"form-group\">
           <label for=\"userName\">User name</label>
           <input type=\"text\" id=\"userName\" name=\"userName\" placeholder=\"Enter userName\" required>
           </div>
           <div class=\"form-group\">
           <label for=\"password\">Password</label>
           <input type=\"password\" id=\"password\" name=\"password\" placeholder=\"Enter password\">
           </div>
           <button type=\"submit\"> Login</button>
           </form>
           <form action=\"register_student.php\">
           <input type=\"submit\" value=\"Register as student\">
           </form>
		   <form action=\"register_teacher.php\">
           <input type=\"submit\" value=\"Register as teacher\">
           </form>
		   
		  
		  </div><!--login-->");
 }
 elseif ( isset($_SESSION['error']) )
 {
	
	 echo("<div class=\"login\">
           <form action=\"../modules/login.php\" method=\"post\">
           <div class=\"form-group\">
           <label for=\"userName\">User name</label>
           <input type=\"text\" id=\"userName\" name=\"userName\" placeholder=\"Enter userName\" required>
            </div>
            <div class=\"form-group\">
              <label for=\"password\">Password</label>
              <input type=\"password\" id=\"password\" name=\"password\" placeholder=\"Enter password\">
            </div>
              <button type=\"submit\"> Login</button>
              </form>
              <form action=\"register_student.php\">
           <input type=\"submit\" value=\"Register as student\">
           </form>
		   <form action=\"register_teacher.php\">
           <input type=\"submit\" value=\"Register as teacher\">
           </form>
			  ".$_SESSION['error']."
			</div><!--login-->");	
	unset($_SESSION['error']);		  
 }
else
{
	echo ("<div class=\"login\">
		         <form action=\"../modules/logout.php\" method=\"post\">". $_SESSION['userName'] . "
				 <br>
				 <button type=\"submit\"> Log out</button>
				 </form>
		         </div><!--login-->"); 
           }
?>
         	          
<div class="products">          
<?php
try{
	//prepare query
	$stmt = $conn->prepare("SELECT * FROM instruments where display ='on'");
	//execute
	$stmt->execute();
	//retrive all rows
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		$image = $row['image'];
		$hireCost = $row['hireCost'];
 		$instrumentName = $row['instrumentName'];
 		$instrumentID=$row['instrumentID'];
		$condition=$row['condition'];

		echo '<div class="box"><img src="' . $image . '" alt="instrument pickture" ><br/>';
 		echo 'Instrument Name: "' . $instrumentName .'"<br />';
		echo 'Condition: "' . $condition .'"<br />';
 		$amount = number_format($hireCost);
 		echo "Price: $" .$amount.".00<br/>";
 		echo "<form name=\"add\" method=\"get\" action=\"#\">
            <input type=\"hidden\" name=\"instrumentID\" value=".$instrumentID.">
			<input type=\"hidden\" name=\"display\" value=\"off\">
			<input type=submit title='Hire Instrument' value='Hire Instrument' ></form></div>";
	}//1st while loop
}// 1st try
catch(PDOException $e) 
{
	echo $e->getMessage();
}
?>

</div> <!-- close product div -->

<?php 
// Inserting a product into shoppingcart table
if(isset($_GET['instrumentID']))
{
	$cide = $_GET['instrumentID'];
	$userName = $_SESSION['userName'];
	$display = $_GET['display'];

	try{
		$row2=$conn->query("SELECT loginID FROM logins WHERE userName ='$userName'")->fetch();
	    $loginID = $row2['loginID'];

	    $stmt1=$conn->prepare("INSERT INTO hiredinstruments (instrumentID, loginID) VALUES (:instrumentID, :loginID)");
	    $stmt1->bindParam(':instrumentID',$cide );
	    $stmt1->bindParam(':loginID', $loginID ); 
	    $stmt1->execute();
		
		$stmt2=$conn->exec("UPDATE instruments SET display = '$display' where instrumentID ='$cide'");

	    header('Location:'.$_SERVER["HTTP_REFERER"]);
	}catch(PDOException $e)
{
	
    echo $e->getMessage();
}
}
?>
