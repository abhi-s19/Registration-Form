<?php 

session_start();
if(!isset($_SESSION['user'])) {
header("location:index.php");
}
$connect= new PDO("mysql:host=localhost;dbname=phpsample_services","root","");
if(isset($_POST['submit2']))
{
    $id = $_GET['id'];
    $query="
    UPDATE `page` 
    SET `title`=:title, 
        `content`=:content, 
        `stat`=:stat 
  WHERE `id`='".$id."'"
    ;
    $user_data=array(
        ':title'=>$_POST['title'],
        ':content'=>$_POST['content'],
        ':stat'=>$_POST['stat'],
        //':id'=>$_POST['id']
    );

    $stmt=$connect->prepare($query);
    $stmt->execute($user_data);
    header('location:display.php');
}

?>
<html>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<center>
    <form method="post" name="form_home">
        <p>Wellcome <?php echo $_SESSION['user']; ?><a href="logout.php">logout</a></p>
        <?php 
        $id =$_GET['id'];
        if($stmt = $connect->query("SELECT * FROM page WHERE id='".$id."'"))
        {
            $r = $stmt->fetch(PDO::FETCH_ASSOC);
        //}
        ?>
        <p>Page title: <input type="text" name="title" id="title" required value="<?php echo $r['title'] ?>" /></p>
        Content 
            <textarea name="content" cols="10" rows="80" class="ckeditor"><?php  echo $r['content']?></textarea>
        
        <p>status: <input type="text" name="stat" id="stat" required value="<?php echo $r['stat'] ?>" /></p>
        <?php  } ?>
        <input type="submit" name="submit2" id="submit2" value="submit">
    </form>
</center>
</html>