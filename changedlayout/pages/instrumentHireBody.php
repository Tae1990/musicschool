
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