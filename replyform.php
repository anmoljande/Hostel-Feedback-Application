<?php
include'head.php';
echo'
<form method="post" action="reply.php?id='.$_GET['id'].'">
  <textarea name="reply-content"></textarea>
    <input type="submit" value="Submit reply" />
    </form>';
?>