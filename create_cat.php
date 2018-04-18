<?php
include 'head.php';
include 'connect.php';
$sql="SELECT cat_id,cat_name,cat_description FROM categories";
$result=mysqli_query($sql);
if(!$result)
{
	echo'Categories cud not be displayed';
}
else
{
	echo'cool!';
}

?>