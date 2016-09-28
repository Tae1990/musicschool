<?php
session_start() 
?>
<?php
include "database.php";
include "sanitise.php";
$permission=!empty($_POST['permission'])?'on':'off';
$loginID = $_POST['autoID'];
		
try{$statment=$conn->prepare("UPDATE logins SET permission = '$permission' WHERE loginID=$loginID");
	$statment->execute();
	header('Location:'.$_SERVER["HTTP_REFERER"]);
		}catch(PDOException $e)
		{
			echo $e->getMessage();
		}
?>