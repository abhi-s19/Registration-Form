<?php

    $connect= new PDO("mysql:host=localhost;dbname=phpsample_services","root","");
    if(isset($_GET['id']))
    {
        if($stmt = $connect->query("DELETE FROM page WHERE id='".$_GET['id']."'"))
        {
            header("location:display.php");
        }
    }

?>