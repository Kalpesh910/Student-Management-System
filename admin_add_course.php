<?php
session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }

    elseif($_SESSION['usertype']=='student')
    {
        header("location:login.php");
    }

    $host="localhost";
    $user="root";
    $password="";
    $db="schoolproject";
    $data=mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['add_course']))
    {
        $c_name=$_POST['name'];
        $file=$_FILES['image']['name'];
        $dst="./image/".$file;
        $dst_db="image/".$file;

        move_uploaded_file($_FILES['image']['tmp_name'],$dst);

        $sql="INSERT INTO course(name,image) VALUES ('$c_name','$dst_db')";

        $result=mysqli_query($data,$sql);

        if($result)
        {
            echo "<script type='text/javascript'>
            alert('Course Uploaded Successfully')
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
    
    <?php
        include 'admin_css.php';
    ?>

    <style>
        label
        {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg
        {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>
<body>
    
    <?php
        include 'admin_sidebar.php';
    ?>
    <div class="content">
    <center>
        <h1>Add Course</h1>
        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Course Name</label>
                    <input type="text" name="name">
                </div>
                <br>
                <div>
                    <label>Image</label>
                    <input type="file" name="image">
                </div>
                <br>
                <div>
                    <input type="submit" name="add_course" value="Add Course" class="btn btn-primary">
                </div>
            </form>
        </div>
    </center>
    </div>
    
</body>
</html>