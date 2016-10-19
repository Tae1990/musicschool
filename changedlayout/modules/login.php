<?php
include "session.php";
include "database.php";
include "sanitize.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") 
	{
		$userName = !empty($_POST['userName']) ? test_user_input(($_POST['userName'])) : null;
		$password = !empty($_POST['password']) ? test_user_input(($_POST['password'])) : null;
		
		try{
			$stmt = $conn->prepare("SELECT password FROM logins WHERE userName ='$userName'");
			$stmt->execute();
    		$rows=$stmt->fetch();
	
			if (password_verify($password,$rows['password']))
			{
				$_SESSION['login']="yes";
				$row=$conn->query("SELECT role FROM logins WHERE userName ='$userName'")->fetch();
				$role = $row['role'];
				$row=$conn->query("SELECT permission FROM logins WHERE userName ='$userName'")->fetch();
				$permission = $row['permission'];
				if($permission == 'on')
				{
					if($role == 'owner')
				    {
	 				$_SESSION['userName']='owner'; 
	 				header('Location: ../pages/ownerPage.php');
				    }
				    else if($role == 'teacher')
				    { 
					$_SESSION['userName']=$userName;
					header('Location: ../pages/teacherPage.php');
				    }
				    else if($role == 'student')
				    { 
					$_SESSION['userName']=$userName;
					header('Location: ../pages/studentInstrument.php');
				    }
                }
				else
				{
					$_SESSION['error']="<p>You haven't permitted yet.</p>";
		  		    header('Location:'.$_SERVER["HTTP_REFERER"]);
		  		    exit();
				}
			}
			else
			{
		  		$_SESSION['error']="<p>Invaild userName or password.</p>";
		  		header('Location:'.$_SERVER["HTTP_REFERER"]);
		  		exit();
			}
		} /* end try */
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
	} /* end if */ 	
?>