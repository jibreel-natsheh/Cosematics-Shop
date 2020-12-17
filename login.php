<?php
session_start();
$message="";
if(count($_POST)>0) {
    $valid = false;
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $conn = mysqli_connect('localhost','root','','cosmetics_shop') or die('Unable To connect');
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$pass'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
            $valid = true;
    }
    if($valid == true) {
        setcookie("valid", "True", time()+3600);
        header("Location:index.php");
    } 
    else {
        $message = "Invalid Username or Password!";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Cosmetics Shop </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!--Google Font link-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,600,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet">


        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">


        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/plugins.css" />


        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />


        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="200">
<div class="container" style="margin-top:100px;">
    <form name="loginForm" action="" method="post">
        <h3 align="center">Enter Login Details</h3>
        <div class="message"><h4 style="color:red;"><?php if($message!="") { echo $message; } ?></h4></div>
        <h4>Username:</h4>
        <input type="text" name="username" required>
        <h4>Password:</h4>
        <input type="password" name="password" required>
        <br><br>
        <input type="submit" name="submit" value="Log In" style="float:left;">
    </form>
    <p align="center">If you don't have account, click <a href="register.php">here</a> to register.</p>
</div>
<?php include 'footer.php';?>
