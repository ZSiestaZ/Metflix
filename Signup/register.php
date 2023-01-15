<?php include("../condb.php");?>
<?php	 

	if($_POST["Email"] == "" )
	{
		header("refresh:0;url=http://localhost/Metflix/signup.php");
		echo '<script type="text/javascript">alert("Please input your Email!");</script>';
		exit();
	}	
	if(trim($_POST["Name"]) == "")
	{
		header("refresh:0;url=http://localhost/Metflix/signup.php");
		echo '<script type="text/javascript">alert("Please input your Name!");</script>';
		exit();		
	}
	if(trim($_POST["Password"]) == "")
	{
		header("refresh:0;url=http://localhost/Metflix/signup.php");
		echo '<script type="text/javascript">alert("Please input your Password!");</script>';
		exit();	
	}	
	if($_POST["Password"] != $_POST["ConPassword"])
	{
		header("refresh:0;url=http://localhost/Metflix/signup.php");
		echo '<script type="text/javascript">alert("Password not Match!");</script>';
		exit();
	}
	
	$Name= $_POST["Name"]; 
    $Password = $_POST["Password"];
    $Email = $_POST["Email"]; 
	$Status = 'member';
	
	$duplicate=mysqli_query($con,"select * from users where Email='$Email'");
	if (mysqli_num_rows($duplicate)>0)
	{
		header("refresh:0;url=http://localhost/Metflix/signup.php");
		echo '<script type="text/javascript">alert("ซ้ำโว้ยยยยยยยยยย!");</script>';
	}
	else
	{
		$strSQL = "INSERT INTO users (Email,Password,Name,Status) VALUES ('".$Email."','".$Password."','".$Name."','".$Status."')";		
		if (mysqli_query($con, $strSQL)) 
		{
			header("refresh:0;url=http://localhost/Metflix/index.php");
			echo '<script type="text/javascript">alert("Success!");</script>';
		}
		else 
		{
			echo "Error: " . $strSQL . "<br>" . mysqli_error($con);
		}
		mysqli_close($con);	
	}
?>