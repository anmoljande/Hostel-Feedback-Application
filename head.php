<?php
include'connect.php';
?>
<!DOCTYPE html>

<html>
<head>

    <title>FORUM</title>
	
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<div class="background-image"></div>
<h2>Hostel Feedback Discussion Forum</h2>
	<div id="wrapper">
	<div id="menu">
 <a class="item" href="/ip/index.php">Home</a> --
        <a class="item" href="/ip/creatingtopic.php">Create a topic</a> --
        <a class="item" href="/ip/creatingcat.php">Create a category</a>
<div id="userbar">
        <?php	
		
		/*$status=session_status();
         echo$status;*/
		if(isset($_SESSION['signed_in']))//isset solves undefined session problem
		{
			echo'Hello!! <i><b>'.$_SESSION['user_name'].'</i></b>'."<br>".'Not '.$_SESSION['user_name'].'?'.'<a href="signout.php" style="color:white;background-color:purple;">Sign out</a>';
		}
		 else
    {
        echo '<a href="signin.php">Sign in</a> or <a href="signup.php">create an account</a>.';
    }
	
		?>
		
		</div>
		</div>
		<div id="content">
		
	