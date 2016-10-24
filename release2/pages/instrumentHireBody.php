    <div id="wrapper">



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Hired Instruments
                            <small>Student</small>
                        </h1> 
                    </div>
                </div>
                <!-- /.row -->

<div class="products"> 
<?php
     //Get loginID from userName
    $userName = $_SESSION['userName'];
	$row1=$conn->query("SELECT loginID FROM logins WHERE userName ='$userName'")->fetch();
	$loginID = $row1['loginID'];
    $nRows1 = $conn->query("select count(hiredinstruments.hiredInstrumentID) AS NumberOfContract from hiredinstruments
	       				   INNER JOIN logins ON hiredinstruments.loginID = '$loginID'")->fetchColumn();
    if ($nRows1 < 1){
		   echo "You have not borrow any instruments";
	}
	if ($nRows1 > 0){ 
		try{
			//prepare query
			$stmt = $conn->prepare("SELECT instruments.image, instruments.hireCost, instruments.instrumentName, instruments.condition 
									FROM instruments , hiredinstruments where hiredinstruments.loginID = '$loginID'  and 
									instruments.instrumentID = hiredinstruments.instrumentID");
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
	}}
?>
</div> <!-- close product div -->

  </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
 