<?php
    error_reporting(0);
    session_start();
    session_destroy();
    // header("location:index.php");
    if($_SESSION['message'])
    {
        $message=$_SESSION['message'];
        echo "<script type='text/javascript'>
        alert('$message')
        </script>";
    }
    $host="localhost";
    $user="root";
    $password="";
    $db="schoolproject";
    $data=mysqli_connect($host,$user,$password,$db);
    
    if(isset($_POST['apply_contact']))
    {
        $c_name=$_POST['name'];
        $c_email=$_POST['email'];
        $c_subject=$_POST['subject'];
        $c_message=$_POST['message'];

        $sql="INSERT INTO contact(name,email,subject,message) VALUES ('$c_name','$c_email','$c_subject','$c_message')";

        $result=mysqli_query($data,$sql);

        if($result)
        {
            echo "<script type='text/javascript'>
            alert('Message sent Successfully Thank You')
        </script>";
        }
        else
        {
            echo "Upload Failed";
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        .adm_int {
            padding-top: 10px;
        }
        .label_text{
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-right: 10px;
        }
        .input_deg{
            width: 30%;
            height: 40px;
            border-radius: 25px;
            border: 1px solid blue ;
        }
        .input_txt{
            width: 30%;
            height: 120px;
            border-radius: 25px;
            border: 1px solid blue ;
        }
        nav{
            position: fixed;
            background-color: skyblue;
            height: 70px;
            width: 100%;
            z-index: 1;
            line-height: 70px;
            /* padding-top: 30px; */
        }
        .navclass{
            display: grid;
        }
        .logo
        {
            font-size: 25px;
            position: relative;
            left: 5%;
            color: white;
            font-weight: bold;
            line-height: 70px;
        }
        ul
        {
            position: relative;
            float: right;
            margin-right: 20px;
        }

        ul li
        {
            display: inline-block;
            line-height: 50px;
            margin: 0 5px;
        }

        ul li a
        {
            text-decoration: none;
            color: white;
            font-size: 17px;
        }
    </style>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
    <div class="navclass">
    <nav>
        <label class="logo">PCCOE</label>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>
    </div>
        <br><br><br><br>
        <center>
        <h1>Contact Us</h1>
        </center>
        <div align="center" class="contact_form">
        <form action="#" method="POST">
            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>
            <div class="adm_int">
                <label class="label_text">Subject</label>
                <input class="input_deg" type="text" name="subject">
            </div>
            <div class="adm_int">
                <label class="label_text">Message</label>
                <textarea class="input_txt" name="message"></textarea>
            </div>
            <div class="submit">
                <input type="submit" value="Apply" name="apply_contact" class="btn btn-primary">
            </div>
        </form>
</div>
    
</body>
</html>