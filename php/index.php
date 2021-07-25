<?php
    $connect= new PDO("mysql:host=localhost;dbname=phpsample_services","root","");
    $message= '';
    $service='';
    
    $reg_date= date('Y-m-d');
    
    if(isset($_POST["fname"]))
    {
        sleep(5);

        foreach($_POST['service'] as $i)
        {
            $service.=$i.',';
        }

        
        $image = $_FILES["image"]["name"];


        $fileext = pathinfo($image,PATHINFO_EXTENSION);
        $fileext = strtolower($fileext);
        if($fileext=="jpg" || $fileext=="png" || $fileext=="jpeg" || $fileext=="gif")
        {
            move_uploaded_file($_FILES["image"]["tmp_name"],"C:\\xampp\htdocs\phpsampleproject\upload\ ".$image);
            
        }
        else
        {
            echo "sorry file type not correct";
        }
        $query= "
        INSERT INTO contact
        (fname, email, phoneno, call1, budget, service, image, dob, date) VALUES
        (:fname, :email, :phoneno, :call1, :budget, :service, :image, :dob, :date)
        ";

        $user_data = array(
            ':fname' => $_POST["fname"],
            ':email' => $_POST["email"],
            ':phoneno' => $_POST["phoneno"],
            ':call1' => $_POST["call1"],
            ':budget' => $_POST["budget"],
            ':service' => $service,
            ':image' => $image,
            ':dob' => $_POST["dob"],
            ':date' => $reg_date
        );
        $statement = $connect->prepare($query);
        if($statement->execute($user_data))
        {
            $message = '
            <div class="alert alert-success">
             Registration Completed Successfully
            </div>
            ';
        }
        else
        {
            $message = '
            <div class="alert alert-success">
            There is an error in Registration
            </div>
            ';
        }
    }
?>