<?php

include 'head.php';
include 'connect.php';
echo'<h3><u>SIGN UP</u></h3>'.'<br>';
if($_SERVER['REQUEST_METHOD']!='POST')
{
	echo'
	<form method="post" action="">
~USERNAME:<input type="text" name="user_name" required><br><br>
~PASSWORD: <input type="password" name="user_pass"><br><br>
~	RE-PASSWORD:<input type="password" name ="user_pass_check" require><br><br>
~	E-MAIL:<input type="email" name="user_email" required><br><br>
	<input type="submit" value="Add Category">
	</form>';
	
}
else
{
	$errors=array();
	$i=0;
	//username check
	if(isset($_POST['user_name']))
	{
		if(!ctype_alnum($_POST['user_name']))
		{
			$errors[$i]="The username can only contain letters,digits and not special characters.";
			
				$i++;
			
			
		}	
		
	}
	else
	{
		$errors[$i]="Can't be left empty";
		$i++;
	}
	//password check
	if(isset($_POST['user_pass']))
	{
		if($_POST['user_pass']!=$_POST['user_pass_check'])
		{
			$errors[$i]="PASSWORDS DON'T MATCH";
			$i++;
		}
	}
	if(empty($_POST['user_pass']))
	{
		$errors[$i]="PASSWORD FIELD CAN'T BE LEFT EMPTY";
		$i++;
	}
	
	if(!empty($errors))
	{
		echo "TOTAL ERRORS:".$i."<br>"."<br>";
		echo'Correct following errors before continuing';
		echo'<ul>';
		for($i=0;$i<count($errors);$i++)
		{
			echo"<li>";
			echo $errors[$i];
			echo"</li>";
			echo "<br>";
		}
		
		echo'Click here for re entering the correct information <a href=signup.php>BACK TO SIGN-UP PAGE</a>';
		echo'</ul>';
	}
	else
	{
		$p="INSERT INTO users(user_name,user_pass,user_email,user_date,user_level)VALUES
		('".mysqli_real_escape_string($connect,$_POST['user_name'])."',
		'".sha1($_POST['user_pass'])."',
		'" . mysqli_real_escape_string($connect,$_POST['user_email'])." ',NOW(),0)";
				
	$qu=mysqli_query($connect,$p); 


		if(!$qu)
		{
			echo"SOMETHING WENT WRONG !!!  TRY AGAIN .";
		}
		else
		{
			echo'<h1 style="color:red;text-align:center;">'."SIGNED UP SUCESSFULLY".'</h1>';
		echo'<h3 style="color:green;text-align:center;">'."LOGIN HERE AND START POSTING<a href='signin.php'>~LOGIN~</a>";
		}
		//ALTER TABLE tablename AUTO_INCREMENT = 1 for starting user_id from 1 
	}
	
	
}

include 'foot.php';
?>