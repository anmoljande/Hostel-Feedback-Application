<?php

include 'head.php';
include 'connect.php';
	/*	$status=session_status();
echo$status;*/
$sql="SELECT cat_id,cat_name,cat_description FROM categories";
$result=mysqli_query($connect,$sql);
$rows=mysqli_num_rows($result);
if(!$result)
{
	echo'Categories could not be displayed';
}
else
{
	if(mysqli_num_rows($result)==0)
	{
		echo'No categories defined yet';
	}
	else
	{
		echo'<table border="1">
		<tr style="text-align:center;">
		<th >Category</th>
		</tr>';
		  while($row = mysqli_fetch_assoc($result))
        {               
            echo '<tr>';
                echo '<td class="leftpart">';
					$var=$row['cat_id'];
                    echo '<h3><a href="category.php?id='.$var.'">'. $row['cat_name'] . '</a></h3>' . $row['cat_description'];
                echo '</td>';
                           echo '</tr>';
        }
			
			
		}
		
	}

?>