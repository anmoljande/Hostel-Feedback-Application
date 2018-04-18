<?php
include 'connect.php';
include 'head.php';
 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
   
    echo 'This file cannot be called directly.';
}
else
{
    //check for sign in status
    if(isset($_SESSION['signed_in']))
    {
		//a real user posted a real reply
        $sql = "INSERT INTO 
                    posts(post_content,
                          post_date,
                          post_topic,
                          post_by) 
                VALUES ('" . $_POST['reply-content'] . "',
                        NOW(),
                        " . mysqli_real_escape_string($connect,$_GET['id']) . ",
                        " . $_SESSION['user_id'] . ")";
                         
        $result = mysqli_query($connect,$sql);
                         
        if(!$result)
        {
            echo 'Your reply has not been saved, please try again later.'.mysqli_error($connect);
        }
        else
        {
            echo 'Your reply has been saved, check out <a href="topic.php?id='.$_GET["id"].'">the topic</a>.';
        }
    }
		
    else
    {
     
   echo 'You must be signed in to post a reply.';
   
	 
}
}

 
include 'foot.php';

?>