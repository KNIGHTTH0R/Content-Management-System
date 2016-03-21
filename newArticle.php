<?php
include "templates/include/header.php";
require("config.php");
if(isset($_POST['saveChanges']))
{
	$id=$_POST['id'];
	$title=$_POST['title'];
	$date=$_POST['publicationDate'];
	$summary=$_POST['summary'];
	$content=$_POST['content'];
	$query="update articles set publicationDate='$date',title='$title',summary='$summary',content='$content' where id=$id";
	$result=mysqli_query($conn,$query);
	if($result)
	{
		header("Location:admin.php?status='Changed saved'");
	}
}
?>
<?php
session_start(); 
?>
<div id="adminHeader">
        <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="logout.php"?>Log out</a></p>
      </div>

      <h1>New Article</h1>

      <form action="newArticle2.php" method="post">
        <ul>
		
          <li>
            <label for="title">Article Title</label>
            <input type="text" name="title" id="title" placeholder="Name of the article" required autofocus maxlength="255" value="" />
          </li>

          <li>
            <label for="summary">Article Summary</label>
            <textarea name="summary" id="summary" placeholder="Brief description of the article" required maxlength="1000" style="height: 5em;"></textarea>
          </li>
		  
         <li>
            <label for="content">Article Content</label>
            <textarea name="content" id="content" placeholder="The HTML content of the article" required maxlength="100000" style="height: 30em;"></textarea>
          </li>

          <li>
            <label for="publicationDate">Publication Date</label>
            <input type="date" name="publicationDate" id="publicationDate" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo (int)$row['publicationDate']?>" />
          </li>


        </ul>

        <div class="buttons">
          <input type="submit" name="saveChanges" value="Save Changes" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

      </form>
      <p><a href="deleteArticle.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Delete This Article?')">Delete This Article</a></p>

<?php include "templates/include/footer.php" ?>
