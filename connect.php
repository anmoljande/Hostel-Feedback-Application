<?php
echo'SUCESS';
$mysql_host='localhost';
$mysql_user='root';
$mysql_password='anmol2739bjande';
$mysql_db_name='forum';
$connect=mysqli_connect($mysql_host,$mysql_user,$mysql_password);
if(!$connect)
{
	exit("ERROR:COULD NOT ESTABLISH COoNNECTION");
}
$a=mysqli_select_db($connect,'forum');
if(!$a)
{
	exit('error:could not select database');
}
mysqli_select_db($connect, "forum") or die ("no database"); 		
	

?>