 	          
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
