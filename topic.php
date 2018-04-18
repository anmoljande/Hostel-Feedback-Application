<?php
include'head.php';
include 'connect.php';



 $sql = "SELECT  
                    topic_id,
                    topic_subject
                   
                FROM
                    topics
                WHERE
                    topic_id = " . mysqli_real_escape_string($connect,$_GET['id']);
				
				$result=mysqli_query($connect,$sql);
				if(!$result)
				{
					echo'Error occurred';
				}
				else
	{					
				if(mysqli_num_rows($result) == 0)
				{
				echo 'There is data in  topic of this category yet.';
				}
					else
			{   
                while($row = mysqli_fetch_assoc($result))
				{
					echo'<table border=2>
					<tr>
					<th style="text-align:center;">
					'.$row["topic_subject"].'
					</th>
					</tr>';
				}
				
				$sql="SELECT post_topic,post_content,
					post_date,
					post_by,
					user_id,
					user_name
				FROM
					posts
				LEFT JOIN
					users
				ON
						posts.post_by = users.user_id
					WHERE
						posts.post_topic = " . mysqli_real_escape_string($connect,$_GET['id']);
						
						$result=mysqli_query($connect,$sql);
				if(!$result)
				{
					echo'Error occurred';
				}
				
				else
				{
					echo'<a href="replyform.php?id='.$_GET['id'].'">Add your views</a>';
					 if(mysqli_num_rows($result) == 0)
						{
							echo 'There is no data in this topic !';
						}
						
						else
						{			
					
							while($row = mysqli_fetch_assoc($result) )
							{   						
								echo'<table border=2>
								<tr>
								<td>
								Post by:<br>
								'.$row["user_name"].'
								<br>
								<br>
								'.$row["post_date"].'
								
								</td>
								<td>'.$row["post_content"].'</td>
								</td>
								</tr><br>';	
								
					 
					 
							}
							
							
			
							
						}
						
						
									
				}
		
			}
			
	
	}
	
	
				

?>