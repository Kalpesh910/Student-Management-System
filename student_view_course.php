<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }

    elseif($_SESSION['usertype']=='admin')
    {
        header("location:login.php");
    }

    $host="localhost";
    $user="root";
    $password="";
    $db="schoolproject";

    $data=mysqli_connect($host,$user,$password,$db);

    $name=$_SESSION['username'];
    
    $sql="SELECT * FROM user WHERE username='$name' ";

    $result=mysqli_query($data,$sql);

    $info=mysqli_fetch_array($result);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>

    <?php
        include 'student_css.php'
    ?>

    <style>
        label
        {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top:10px;
            padding-bottom:10px;
        }
        .div_deg
        {
            background-color: skyblue;
            width: 500px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>
<body>
    <?php
        include 'student_sidebar.php'
    ?>

    <div class="content">
        <center>
            <h1>My Course</h1>
            <br><br>
        <form action="#" method="POST">
            <div class="div_deg">

        
            <div>
                <label>Course</label>
                <h1><?php echo "{$info['courses']}"?></h1>
            </div>
            
            </div>
        </form>
        </center>
    </div>
</body>
</html>