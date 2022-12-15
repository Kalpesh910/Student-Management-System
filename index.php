<?php
    error_reporting(0);
    session_start();
    session_destroy();
    if($_SESSION['message'])
    {
        $message=$_SESSION['message'];
        echo "<script type='text/javascript'>
        alert('$message')
        </script>";
    }
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "schoolproject";
    $data=mysqli_connect($host,$user,$password,$db);

    $sql="SELECT * FROM teacher";

    $result = mysqli_query($data,$sql);

    $sql2="SELECT * FROM course";
    $result2 = mysqli_query($data,$sql2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
    .course{
    width: 90%;
    height: 200px;
}
</style>

</head>
<body>
    <nav>
        <label class="logo">PCCOE</label>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="contact.php">Contact</a></li>
            <!-- <li><a href="">Admission</a></li> -->
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>
    <div class="section1">
        <label class="img_text"><h3>PIMPRI CHINCHWAD EDUCATION TRUST's</h3><h1>PIMPRI CHINCHWAD COLLEGE OF ENGINEERING PUNE</h1></label>
        <img class="main_img" src="pccoemain.jpg" alt="">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img"src="squaremid.jpg" alt="">
            </div>

            <div class="col-md-8">
                <h1>Welcome to PCCOE</h1>
                <p>Information Technology Course started in the academic year 2001-02 with a vision to develop high quality Information Technology professionals through Quality Education and dedicated faculty. The Information Technology Department has well established state of the art computer laboratories and class rooms equipped with modern teaching aids and computing facilities. It is a measure of its success that in a short span of time, the institution gives out a promise of attaining excellence and keeping abreast of latest technological developments around, for utility thereon.
Department has the competent Faculty and dedicated Staff do work hard to groom the technical and overall personality of students through meticulously planned, outcome based curriculum delivery with co-curricular and extra-curricular enjoyable learning activities</p>
            </div>
        </div>
    </div>

    <center>
        <h1>Our Teacher</h1>
    </center>

    <div class="container">
        <div class="row">

            <?php
                while($info=$result->fetch_assoc())
                {
            ?>

            <div class="col-md-4">
                <img class="teacher" src="<?php echo "{$info['image']}" ?>">
                <h3><?php echo "{$info['name']}"?></h3>
                <h5><?php echo "{$info['description']}"?></h5>
                <p></p>
            </div>
            
            <?php
                }
            ?>
        </div>
    </div>


    <center>
        <h1>Our Courses</h1>
    </center>


    <div class="container">
        <div class="row">

            <?php
                while($info=$result2->fetch_assoc())
                {
            ?>

            <div class="col-md-4">
                <img class="course" src="<?php echo "{$info['image']}" ?>">
                <h3><?php echo "{$info['name']}"?></h3>
            </div>
            
            <?php
                }
            ?>
        </div>
    </div>
    <center>
        <h1 class="adm">Admission Form</h1>
    </center>

    <div align="center" class="admission_form">

        <form action="data_check.php" method="POST">
            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>
            <div class="adm_int">
                <label class="label_text">Phone</label>
                <input class="input_deg" type="text" name="phone">
            </div>
            <div class="adm_int">
                <label class="label_text">Message</label>
                <textarea class="input_txt" name="message"></textarea>
            </div>
            <div class="adm_int">
                <input class="btn btn-primary" id="submit" type="submit" value="apply" name="apply">
            </div>
        </form>
    </div>

    <footer>
        <h3 class = "footer_text">Copyright @2022 PCCOE Pune all rights reserved</h3>
    </footer>

</body>
</html>