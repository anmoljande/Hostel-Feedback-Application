<?php
include 'head.php';
include 'connect.php';
$sql="SELECT
		cat_id,
		cat_name,
		cat_description
		FROM
		categories 
		WHERE
		cat_id=".mysqli_real_escape_string($connect,$_GET['id']);
		$result=mysqli_query($connect,$sql);
		
		if(!$result)
		{
			
			echo'The topics cant be displayed'.mysqli_error($connect);
		}
		else
		{
			//$row = mysqli_fetch_assoc($result);
			
			if(mysqli_num_rows($result)==0)
			{
				echo'This category does not exist';
				
			}
			else 
			{
				//echo$row['cat_name'];
				//echo'hello';
				while($row=mysqli_fetch_assoc($result))
				{
					echo'<h3>Topics in Category-<u  style="color:red;">'.$row['cat_name'].'</u>'.' are:-</h3>';
				}
				 $sql = "SELECT  
                    topic_id,
                    topic_subject,
                    topic_date,
                    topic_cat
                FROM
                    topics
                WHERE
                    topic_cat = " . mysqli_real_escape_string($connect,$_GET['id']);
				
				$result=mysqli_query($connect,$sql);
				if(!$result)
				{
					echo'Error occurred';
				}
				else
				{
					 if(mysqli_num_rows($result) == 0)
						{
							echo 'There are no topics in this category yet.';
						}
						else
						{
               
							echo '<table border="1">
							<tr>
                        <th>Topic</th>
                        <th>Created at</th>
                      </tr>'; 
                     
                while($row = mysqli_fetch_assoc($result))
                {               
                    echo '<tr>';
                        echo '<td class="leftpart">';
                            echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h3>';
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo date('d-m-Y', strtotime($row['topic_date']));
                        echo '</td>';
                    echo '</tr>';
                }
            
						
					
				}
				
			}
			
		}
		}
		


?>