<?php
session_start();
$message="";
if(count($_POST)>0) {
    $valid = false;
    $username = $_POST['username'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    if($pass1 == $pass2) {
        $conn = mysqli_connect('localhost','root','','cosmetics_shop') or die('Unable To connect');
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$pass1')";
        if($conn->query($sql) === True){
            $valid = true;
        }else{
            $message = "Invalid Username!";
        }
    } 
    else {
        $message = "Passwords Doesn't Match!";
    }
    if($valid == true) {
        setcookie("valid", "True", time()+3600);
        header("Location:index.php");
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
        <div class="message"><?php if($message!="") { echo $message; } ?></div>
        <h3 align="center">Regester New User</h3>
        <h4>Username:</h4>
        <input type="text" name="username" required>
        <h4>Password:</h4>
        <input type="password" name="password1" required>
        <h4>Re-Type Password:</h4>
        <input type="password" name="password2" required>
        <br><br>
        <input type="submit" name="Regester" value="Register" style="float:left;">
    </form>
    <p align="center">If you already have account, click <a href="login.php">here</a> to Log In.</p>
</div>
<?php include 'footer.php';?>
