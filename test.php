<?php
session_start();
$status=session_status();
		echo$status;
		
echo$_SESSION['signed_in'];
 ?>