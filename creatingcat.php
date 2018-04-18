<?php
include 'head.php';
include 'connect.php';

echo'<h3>Create Category</h3>'.'<br>';
if($_SERVER['REQUEST_METHOD']!= 'POST')
{
	
   if(isset($_SESSION['user_level']))
   {
	   if(($_SESSION['user_level'])==1)
	   {
    echo"<form method='post' action=''>
        Category name: <input type='text' name='cat_name' /><br>
        Category description:<br><textarea name='cat_description' /></textarea><br>
        <input type='submit' value='Add category' />
     </form>";
	   }
	   else{
		   	   echo'You are not Admin, you could only post in already created categories ';
	   }
   }
   else{
	   echo'You are not Admin , wait for admin to create a category OR if you are admin signin first';
   }
	 }
else
{
$p="INSERT INTO categories(cat_name,cat_description) VALUES
		('".mysqli_real_escape_string($connect,$_POST['cat_name'])."',
		'" . mysqli_real_escape_string($connect,$_POST['cat_description'])." ')";
				
    $result = mysqli_query($connect,$p);
    if(!$result)
    {
       
        echo 'Error';
    }
    else
    {
        echo 'New category successfully added.';
    }
}
?>