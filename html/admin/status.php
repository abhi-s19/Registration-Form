<?php 

    $connect= new PDO("mysql:host=localhost;dbname=phpsample_services","root","");
    $id=$_GET['id'];
    $stat=$_GET['stat'];
    $value=0;
    if($stat==0)
    {
        $value=1;
    }
    $query="UPDATE page SET stat=' ".$value." ' WHERE id=' ".$id." '";
    if($stmt=$connect->query($query))
    {
        header("location:display.php");
    }

?>