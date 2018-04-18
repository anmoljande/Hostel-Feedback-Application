<?php
include 'connect.php';
include 'head.php';
echo'<h3>Create topic</h3>';




    if(!isset($_SESSION['signed_in'])) 
    { 
echo'Sorry, you have to <a href="signin.php">signed in</a> to create a topic.';
    }
else	
{
	if($_SERVER['REQUEST_METHOD']!='POST')
	{
		$sql="select cat_id,cat_name,cat_description from categories";
		$result=mysqli_query($connect,$sql);
		if(!$result)
		{
			echo"DATABASE access failed";
		}
		else
		{
			if(mysqli_num_rows($result)==0)
			{
				if($_SESSION['user_level'] == 1)
                {
                    echo 'You have not created categories yet.';
                }
                else
                {
                    echo 'Before you can post a topic, you must wait for an admin to create some categories.';
                }
            }
			else
			{
				echo'<form method="post" action="">
                    Subject: <input type="text" name="topic_subject" />
                    Category:'; 
                 echo '<select name="topic_cat">';
				   while($row = mysqli_fetch_assoc($result))
                    {
                        echo '<option value="'.$row['cat_id'].'">' . $row['cat_name'] . '</option>';
                    }
					echo'</select>';
					echo'<br>Message:<br><textarea name="post_content"></textarea><br>
					<input type="submit" value="Create topic">
					</form>';
				
			}				
		
		}
		
	}
	else
	{
		$query='BEGIN WORK;';
		$result=mysqli_query($connect,$query);
		if(!$result)
		{
			echo'error occured !';
		}
		else{
			//	echo'sucess';
			$sql="insert into topics(topic_subject,
									topic_date,
									topic_cat,
									topic_by)
				values('".mysqli_real_escape_string($connect,$_POST['topic_subject'])."',now(),
				" . mysqli_real_escape_string($connect,$_POST['topic_cat']) . ",
                               " . $_SESSION['user_id'] . "
                               )";
			$result=mysqli_query($connect,$sql);
			if(!$result)
			{
				echo'cant insert';
                    echo 'An error occured while inserting your post. Please try again later.' . mysql_error();
                    $sql = "ROLLBACK;";
                    $result = mysqli_query($connect,$sql);
				
			}
			else{
				$topicid=mysqli_insert_id($connect);
				$sql="insert into posts(post_content,
									post_date,
									post_topic,
									post_by)
					values('".mysqli_real_escape_string($connect,$_POST['post_content'])."',now(),
					".$topicid.",
					" . $_SESSION['user_id'] . "
                       )";
					$result=mysqli_query($connect,$sql);
				
					if(!$result)
					{
						echo'cant insert';
						echo 'An error occured while inserting your post. Please try again later.';
						$sql = "ROLLBACK;";
						$result = mysqli_query($connect,$sql);
				
					}
					else
                {
                    $sql = "COMMIT;";
                    $result = mysqli_query($connect,$sql);
                     
                    
                    echo 'You have successfully created <a href="topic.php?id='.$topicid .'">your new topic</a>.';
                }
            }
        }
			}
			
				
}


