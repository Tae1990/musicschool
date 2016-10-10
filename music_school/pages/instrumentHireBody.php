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
	$userName = $_SESSION['userName'];
	$row2=$conn->query("SELECT loginID FROM logins WHERE userName ='$userName'")->fetch();
	$loginID = $row2['loginID'];
	//prepare query
	$stmt = $conn->prepare("SELECT instruments.image, instruments.hireCost, instruments.instrumentName, instruments.condition 
	                        FROM instruments , hiredInstruments where hiredInstruments.loginID = '$loginID'  and 
							instruments.instrumentID = hiredInstruments.instrumentID");
	//execute
	$stmt->execute();
	//retrive all rows
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		$image = $row['image'];
		$hireCost = $row['hireCost'];
 		$instrumentName = $row['instrumentName'];
		$condition=$row['condition'];

		echo '<div class="box"><img src="' . $image . '" alt="instrument pickture" ><br/>';
 		echo 'Instrument Name: "' . $instrumentName .'"<br />';
		echo 'Condition: "' . $condition .'"<br />';
 		$amount = number_format($hireCost);
 		echo "Price: $" .$amount.".00<br/></div>";
	}//1st while loop
}// 1st try
catch(PDOException $e) 
{
	echo $e->getMessage();
}
?>
</div> <!-- close product div -->