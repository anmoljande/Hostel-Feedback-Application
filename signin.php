<?php
include 'head.php';
include 'connect.php';
		
//session_start();
echo'<h3><u>SIGN IN</u></h3>'.'<br>';
if(isset($_SESSION['signed_in'])&& $_SESSION['signed_in']==true)
{
	
	echo'Your are already signed in !, you can sign-out <a href="signout.php">SIGN OUT</a>';
}
else
{
	if($_SERVER['REQUEST_METHOD']!='POST')
	{
		echo'<form method="post" action="">
		Username:<input type="text" name="user_name" required>
		Password:<input type="password" name="user_pass" required>
		<input type="submit" value="Sign in">
		</form>';
		
	}
	else
	{
		$sql="SELECT user_id,user_name,user_level FROM users WHERE
		user_name='". mysqli_real_escape_string($connect,$_POST['user_name'])."'
		AND user_pass='".sha1($_POST['user_pass'])."'";
		$result=mysqli_query($connect,$sql);
		$rows=mysqli_num_rows($result);
		if(!$result)
		{
			echo 'Something went wrong while signing in !! Try again later.';
		}
		else
		{
			if(mysqli_num_rows($result)==0)
			{
			echo'Username or password is incorrect !! '	;
				
			}
			else
			{
				
				$_SESSION['signed_in']=true;
				 while($row = mysqli_fetch_assoc($result))
                    {
                        $_SESSION['user_id']    = $row['user_id'];
                        $_SESSION['user_name']  = $row['user_name'];
                        $_SESSION['user_level'] = $row['user_level'];
                    }
				echo'Welcome,'.$_SESSION['user_name'].'<a href="index.php">Proceed to the forum overview</a>.';
			
			}
			
			
		}
		
		
	}
}
?>