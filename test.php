<?php
include 'connect.php';
mysqli_select_db($connect, "forum") or die ("no database"); 
	echo'
	<form method="post" action="">
~USERNAME:<input type="text" name="user_name"><br><br>
~PASSWORD: <input type="password" name="user_pass"><br><br>
~	RE-PASSWORD:<input type="password" name ="user_pass_check" ><br><br>
~	E-MAIL:<input type="email" name="user_email"><br><br>
	<input type="submit" value="Add Category">
	</form>';
	
$sql="INSERT INTO users(user_name,user_pass,user_email,user_date,user_level)VALUES
		('".mysqli_real_escape_string($connect,$_POST['user_name']."',
		'".sha1($_POST['user_pass'])."',
		'" . mysqli_real_escape_string($connect,$_POST['user_email'])." ',NOW(),0");
	
	
	$query=mysqli_query($connect,$sql); 
	
	


?>