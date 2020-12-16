<?php
if(isset($_POST['Logout'])) {
    setcookie("valid", "", time()-3600);

    header("location:login.php");
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
        <header id="main_menu" class="header navbar-fixed-top">            
            <div class="main_menu_bg">
                <div class="container-fluid">
                    <div class="row">
                        <div class="nave_menu">
                            <nav class="navbar navbar-default">
                                <div class="container-fluid">
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav navbar-center">
                                            <li><a href="index.php">Products</a></li>
                                            <li><a href="new_product.php">Add Product </a></li>
                                            <li><a href="sell_product.php">Sell Product</a></li>
                                            <li><a href="sales_history.php">Sales History</a></li>
                                            <li><a href="search_product.php">Search</a></li>
                                        </ul>
                                        <div><form action="" method="post"><input type="submit" name="Logout" value="Logout"></form></div>
                                    </div>
                                </div>
                            </nav>
                        </div>	
                    </div>
                </div>
            </div>
        </header> <!--End of header -->
