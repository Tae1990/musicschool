<?php
session_start(); 
?>
<?php
include "database.php";
include "sanitize.php";
$instrumentID = $_POST['instrumentID'];
$userName = $_SESSION['userName'];
	
try{
 	$row=$conn->query("SELECT loginID FROM logins WHERE userName ='$userName'")->fetch();
	$loginID = $row['loginID']; 
	
	$stmt1=$conn->prepare("INSERT INTO hiredinstruments (instrumentID, loginID) VALUES (:instrumentID, :loginID)");
	$stmt1->bindParam(':instrumentID',$instrumentID );
	$stmt1->bindParam(':loginID', $loginID ); 
	$stmt1->execute();
	header('Location:'.$_SERVER["HTTP_REFERER"]);
}   catch(PDOException $e)
{
	
    echo $e->getMessage();
}
?>