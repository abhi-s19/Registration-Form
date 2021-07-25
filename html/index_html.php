<?php include 'C:\xampp\htdocs\phpsampleproject\php\index.php';?>


<html>
<head>
<meta charset="utf-8">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--<script src="../js/index.js" type="text/javascript"></script>!-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="..\css\index.css"/>
    
</head>
    

    <center>
    <h2>Contact Us</h2>
    <p>Please use this form to contact a member of our website team</p>
    <form method="post" name="form_index" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
        <p>
            <label for="fname">Full Name</label>
            <input type="text" placeholder="Enter the name" id="fname" name="fname" size="30"/>
            <span id="error_full_name" class="text-danger"></span>
        </p>
        <p>
            <label for="email">Email Address</label>
            <input type="email" placeholder="Enter your Email id" id="email" name="email" size="30">
            <span id="error_email" class="text-danger"></span>
        </p>
        <p>
            <label for="phoneno">Phone Number</label>
            <input type="tel" placeholder="Enter your phone number" id="phoneno" name="phoneno" size="30">
            <span id="error_phoneno" class="text-danger"></span>
        </p>
        <p>
            <label for="call1">Best Time to Call</label>
            <input type="radio" name="call1" value="morning" checked>morning
            <input type="radio" name="call1" value="afternoon">afternoon
            <input type="radio" name="call1" value="evening">evening
        </p>
        <p>
            <label for="budget">Budget</label>
            <select type="list" name="budget" id="budget">
                <option>--Select One--</option>
                <option value="100-500">Rs. 100-500</option>
                <option value="500-1000">Rs. 500-1000</option>
                <option value="1000-1500">Rs. 1000-1500</option>
                <option value="Not sure">Not sure</option>
            </select>
            <span id="error_budget" class="text-danger"></span>
        </p>
        <p>
            <label for="service">Services Needed:<br>(check all that apply)</label>
            <table width="400px" border="2">
                <div id=service>
                <tr>
                    <td><input type="checkbox" name="service[]" id="html" value="html">html</td>
                    <td><input type="checkbox" name="service[]" id="php" value="php">php</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="service[]" id="asp" value="asp">asp</td>
                    <td><input type="checkbox" name="service[]" id="java" value="java">java</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="service[]" id="c" value="c">c</td>
                    <td><input type="checkbox" name="service[]" id="python" value="python">python</td>
                </tr>
                <span id="error_service" class="text-danger"></span>
                </div>
                <tr>
                    <td><label for="Image">image</label></td>
                    <td><input type="file" name="image" id="image"/></td>
                </tr>
                
            </table>
            <span id="error_image" class="text-danger"></span>
            
        </p>
        <p>
            <label for="dob">Birthday </label>
            <input type="date" id="dob" name="dob">
            <span id="error_dob" class="text-danger"></span>
        </p>
        <p>
            <input type="submit" id="submit" name="submit">
        </p>
    </form>
    </center>    


    
</html>
<script>
    $(document).ready(function()
{
    $('#submit').click(function()
    {
        var error_full_name='';
        if($.trim($('#fname').val()).length == 0)
        {
            error_full_name = 'Full Name is required';
            $('#error_full_name').text(error_full_name);
            $('#fname').addClass('has-error');
        }
        else
        {
            error_full_name = '';
            $('#error_full_name').text(error_full_name);
            $('#fname').removeClass('has-error');
        }

        var error_email='';
        var email_validation = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if($.trim($('#email').val()).length == 0)
        {
            error_email = 'Email is required';
            $('#error_email').text(error_email);
            $('#email').addClass('has-error');
        }
        else
        {
            if(!email_validation.test($('#email').val()))
            {
                error_email = 'Invalid Email';
                $('#error_email').text(error_email);
                $('#email').addClass('has-error');
            }
            else
            {
                error_email = '';
                $('#error_email').text(error_email);
                $('#email').removeClass('has-error');
            }
            
        }


        var error_phoneno='';
        var phoneno_validation = /^\d{10}$/;
        if($.trim($('#phoneno').val()).length == 0)
        {
            error_phoneno = 'Phone Number is required';
            $('#error_phoneno').text(error_phoneno);
            $('#phoneno').addClass('has-error');
        }
        else
        {
            if(!phoneno_validation.test($('#phoneno').val()))
            {
                error_phoneno = 'Invalid Phone Number';
                $('#error_phoneno').text(error_phoneno);
                $('#phoneno').addClass('has-error');
            }
            else
            {
                error_phoneno = '';
                $('#error_phoneno').text(error_phoneno);
                $('#phoneno').removeClass('has-error');
            }
        }

        var error_budget='';
        //alert ($('#dob').val());
        if($.trim($('#budget').val()) == '--Select One--')
        {
            error_budget = 'Budget is required';
            $('#error_budget').text(error_budget);
            $('#budget').addClass('has-error');
        }
        else
        {
            error_budget = '';
            $('#error_budget').text(error_budget);
            $('#budget').removeClass('has-error');
        }

        var error_Service='';        
        if ($('input:checkbox').filter(':checked').length < 1)
        {
            /*alert("Please Check at least one Check Box");
            return false;*/
            error_service='Please opt atleast one service';
            $('#error_service').text(error_service);
            $('#service').addClass('has-error');

        }
        else
        {
            error_service = '';
            $('#error_service').text(error_service);
            $('#service').removeClass('has-error');
        }

        var error_image='';
        if(($('#image').val()).length == 0)
        {
            error_image = 'Please select a image';
            $('#error_image').text(error_image);
            $('#image').addClass('has-error');
        }
        else
        {
            error_image = '';
            $('#error_image').text(error_image);
            $('#image').removeClass('has-error');
        }

        var error_dob='';
        if(($('#dob').val()).length == 0)
        {
            error_dob = 'Please select you DOB';
            $('#error_dob').text(error_dob);
            $('#dob').addClass('has-error');
        }
        else
        {
            error_dob = '';
            $('#error_dob').text(error_dob);
            $('#dob').removeClass('has-error');
        }

        if(error_full_name!= '' || error_email!= '' || error_phoneno!= '' || error_budget!= ''|| error_service!= ''|| error_image!= ''|| error_dob!= '')
        {
            return false;
        }
        else
        {
            $('#form_index').submit();
        }
    });
});
</script>
