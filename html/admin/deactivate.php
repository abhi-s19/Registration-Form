<?php

    $connect= new PDO("mysql:host=localhost;dbname=phpsample_services","root","");
    if(isset($_POST['submit']))
    {   
        if(isset($_POST['ch_box'])){
        foreach($_POST['ch_box'] as $i)
        {
            if($stmt = $connect->query("DELETE FROM page WHERE id='$i' "))
            {
                header("location:display.php");
            }
        }}
    }
?>
<html>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <center>
    <h3>Display all Records</h3>

    <form method="post" id="form_display" name="form_display">
    <table width="1000px" border="2">
    
        <tr>
        <td>S.no</td>
        <td>Title</td>
        <td>content</td>
        <td>Action</td>
        </tr>

        <?php

            if($stmt = $connect->query("SELECT * FROM page WHERE stat=0"))
            {
                $ctr = 0;
                while($r = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $ctr++;
                //}
            //}
            $status = "Active";
              if($r['stat']==0) {
                  $status = "Deactive";
              }

        ?>

        <tr>
        
        <td><?php echo $ctr;?></td>
        <td><?php if(isset($r['title'])) {echo $r['title'];}?></td>
        <td><?php if(isset($r['content'])) {echo $r['content'];}?></td>
        <td>
            <a href="delet.php?id=<?php echo $r['id'];?>">Delete</a>
            <a href="edit.php?id=<?php echo $r['id']; ?>" onclick="return fileshow()">Edit</a>
                 
            <a href="status.php?id=<?php echo $r['id']; ?>& stat=<?php echo $r['stat']; ?>" ><?php echo $status; ?></a>
            <input type="checkbox" class="p" name="ch_box[]" value="<?php echo $r['id']; ?>" />
        </td>
        
        <?php }} ?>
        </tr>
        
        <input type="checkbox" id="selectall"/>
        <input type="submit" id="submit" name="submit" value="delete"/>

    </table> 
    </from>
    </center>

</html>

<script>
    $(document).ready(function(){
        $("#selectall").click(function(event){
            if(this.checked){
                $(".p").each(function(){
                    this.checked = true;
                });
            }else{
                $(".p").each(function(){
                    this.checked = false;
                });
            }
        });
        $('#submit').click(function()
        {
            if ($('input:checkbox').filter(':checked').length < 1)
            {
                alert("Please select atleast one chech box");
            }
        });
    });
</script>