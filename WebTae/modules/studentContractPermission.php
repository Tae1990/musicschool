<?php
session_start(); 
?>
<?php
include "database.php";
include "sanitize.php";
$studentContractPermission=!empty($_POST['studentContractPermission'])?'yes':'no';
$studentContractID = $_POST['autoID'];
		
try{
	$statment=$conn->prepare("UPDATE contracts SET studentContractPermission = '$studentContractPermission' 
                             WHERE studentContractID='$studentContractID'");
	$statment->execute();
	$statment->execute();
	header('Location:'.$_SERVER["HTTP_REFERER"]);
		}catch(PDOException $e)
		{
			echo $e->getMessage();
		}
?>