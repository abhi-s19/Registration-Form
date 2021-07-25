<?php

    session_start();
    $connect= new PDO("mysql:host=localhost;dbname=phpsample_services","root","");
    if(isset($_POST['username'])) {
        $name = $_POST['username'];
        $password = md5($_POST['password']);
        if($stmt = $connect->query("SELECT * FROM admin WHERE name='".$name."' AND password='".$password."'")) {
            if($stmt->rowCount() > 0) {
                $_SESSION['user'] = $name;
                header("location:home.php");
            } else {
                echo "error";
            }
        }
  }

?>
<style>

    #username,#password{
        margin-bottom: 5px;
    }

</style>
<html>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--<link rel="stylesheet" href="..\css\index.css"/>!-->
    <center>
        <form method="post" id="search" name="search">
            <h3>Contact Us</h3>
            User Name<input type="text" name="username" id="username" placeholder="Enter your name"/><br>
            Password<input type="password" name="password" id="password" placeholder="Enter your password"/></br>
            <input type="submit" name="submit" id="submit" value="submit">
        </form>
    </center>

</html>
<script>

    $(document).ready(function()
    {
        $('#submit').click(function()
        {
            if($.trim($('#username').val()).length == 0)
            {
                alert("please enter the username");
            }
            else if($.trim($('#username').val())!="admin")
            {
                alert("please enter valid username");
            }

            else if($.trim($('#password').val()).length == 0)
            {
                alert("please enter the password");
            }
            else if($.trim($('#password').val())!="admin")
            {
                alert("please enter valid password");
            }
        });
    });

</script>
