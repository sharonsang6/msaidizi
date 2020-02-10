<?php
if (isset($_POST['submitcomment'])) {
    $gander_technologies_blog_id = $_POST['gander_technologies_blog_id'];
    $blogcomment = $_POST['blogcomment'];

    if($gander_technologies_blog_id == "") { $alert = "Provide id"; }
    elseif($blogcomment == "") { $alert = "Empty commrnt field "; }
    else
    {
      try
      {
        if($user->submittedcomments($gander_technologies_blog_id, $blogcomment)){  
            $alert = "Comment posted";
          }
      }
      catch(PDOException $e)
      {
        echo $e->getMessage();
      }
    } 
}	
?>
