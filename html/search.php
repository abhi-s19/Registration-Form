<?php

    $connect= new PDO("mysql:host=localhost;dbname=phpsample_services","root","");

?>
<html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <center>
    
        <form method="post" id="search" name="search">

            <h3>Display All Records</h3>
            <input type="text" name="txtsearch" id="txtsearch" placeholder="search for records"/>
            <input type="submit" id="search" name="search" value="search"/>
            <table border="2" style="margin-top:25px">
                <tr>
                    <td>S.no</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Image</td>
                    <td>Action</td>
                </tr>

                <?php
                
                if(isset($_POST['search']))
                {
                    if(isset($_POST['txtsearch']))
                    {
                        $srch=$_POST['txtsearch'];
                        if($stmt=$connect->query("SELECT * FROM contact WHERE fname LIKE '%$srch%'"))
                        {
                            $ctr=0;
                            while($r = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                $ctr++;
                            //}
                        //}
                    //}
                //}
                ?>
                 <tr>
                    <td><?php echo $ctr; ?></td>
                    <td><?php if(isset($r['fname'])) {echo $r['fname']; } ?></td>
                    <td><?php if(isset($r['email'])) {echo $r['email']; } ?></td>
                    <td><img src="..\upload\ <?php if(isset($r['image'])) {echo $r['image']; } ?>" width="100" height="100"/></td>
                    <td><a href="delete.php?id=<?php echo $r['id'];?>">Delete</a></td>
                        
                    <?php }}}} ?>
                </tr>   
            </table>

        </from>
    
    </center>
    
</html>