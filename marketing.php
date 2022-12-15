<?php

error_reporting(0);
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

    $sql="SELECT * FROM user WHERE usertype='student' AND courses='marketing'";

    $result=mysqli_query($data,$sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        .table_th{
            padding: 20px;
            font-size: 20px
        }
        .table_td{
            padding: 20px;
            background-color: skyblue;
        }
    </style>
    <?php
        include 'admin_css.php';
    ?>

</head>
<body>
    
    <?php
        include 'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
            
        
        <h1>Marketing Student Data</h1>
        <?php
            if($_SESSION['message'])
            {
                echo $_SESSION['message'];
            }

            unset($_SESSION['message']);
        ?>

        <br>
        <table border="1px">
            <tr>
                <th class="table_th">UserName</th>
                <th class="table_th">Email</th>
                <th class="table_th">Phone</th>
            <?php
                while($info=$result->fetch_assoc())
                {

                
            ?>
            <tr>
                <td class="table_td">
                    <?php echo "{$info['username']}"; ?>
                </td>
                <td class="table_td">
                    <?php echo "{$info['email']}"; ?>
                </td>
                <td class="table_td">
                    <?php echo "{$info['phone']}"; ?>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
        </center>
    </div>
    
</body>
</html>