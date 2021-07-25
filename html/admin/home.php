<?php 
session_start();
if(!isset($_SESSION['user'])) {
    header("location:index.php");
}
$connect= new PDO("mysql:host=localhost;dbname=phpsample_services","root","");

if(isset($_POST['submit1']))
{
    $query="
    INSERT INTO page 
    (title, content, stat) VALUES 
    (:title, :content, :stat)"
    ;
    $user_data=array(
        ':title'=>$_POST['title'],
        ':content'=>$_POST['content'],
        ':stat'=>$_POST['stat']
    );

    $stmt=$connect->prepare($query);
    $stmt->execute($user_data);
}


?>

<html>

    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <center>
        <form method="post" name="form_home">
            <p>Wellcome <?php echo $_SESSION['user']; ?><a href="logout.php">logout</a></p>
            <p>Page title: <input type="text" name="title" id="title" required placeholder="Enter your title" /></p>
            Content 
                <textarea name="content" cols="10" rows="80" class="ckeditor"></textarea>
            
            <p>status: <input type="text" name="stat" id="stat" required placeholder="Enter your status" /></p>
            <input type="submit" name="submit1" id="submit1" value="submit">
        </form>
    </center>
</html>