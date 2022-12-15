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

    $sql="SELECT * FROM course";
    $result=mysqli_query($data, $sql);

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
        .container
        {
            padding-top: 70px;
        }
        .row
        {
            margin-right: 135px;
            margin-left: -15px;
        }
    </style>
</head>
<body>
    
    <?php
        include 'admin_sidebar.php';
    ?>
    <div class="content">
    <center>
        <h1>Our Course</h1>
        <div class="container">
    <div class="row">
    <?php
    while($info=$result->fetch_assoc())
    {
    ?>
        
            <div class="col-md-4">
                <a href="<?php echo"{$info['name']}"?>.php"><img height="100px" src="<?php echo"{$info['image']}"?>"></a>
                <h3><?php echo"{$info['name']}"?></h3>
    </div>
    <?php
    }
    ?>
    </div>
        </div>
    </center>
    </div>
    
</body>
</html>