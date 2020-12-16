<?php
    session_start();
    $message="";
    $name="";
    $price="";
    if(isset($_SESSION['specs'])){
        $specs = $_SESSION['specs'];
    }else{
        $specs = array();
    }
    if(!isset($_COOKIE["valid"])){
        header("location: login.php");
    }
   else{ 
    $conn = mysqli_connect('localhost','root','','cosmetics_shop') or die('Unable To connect');
    if (isset($_POST['add_spec'])) {
        if(isset($_POST['name'])){
            $name=$_POST['name'];
        }
        if(isset($_POST['price'])){
            $price=$_POST['price'];
        }
        $spec = $_POST['spec'];
        $specs[] = $spec;
        $_SESSION['specs']=$specs;
    }
    if (isset($_POST['add_product'])) {
        $name=$_POST['name'];
        $price=$_POST['price'];
        $sql = "INSERT INTO products (name, price) VALUES ('$name', '$price')";
        if ($conn->query($sql) === TRUE) {
            $message = "New record created successfully";
            $sql = "SELECT id FROM products where name='$name' and price='$price'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                }
                foreach ($specs as $s) { 
                    $sql = "INSERT INTO products_spec (product_id, spec) VALUES ('$id', '$s')"; 
                    $conn->query($sql);
                }
            }
        }
        $name="";
        $price="";
        unset($_SESSION['specs']);
    }
    include 'header.php';?>
<div class="container" style="margin-top: 100px;">
    <form name="addProductForm" action="" method="post">
        <div class="message"><?php if($message!="") { echo $message; } ?></div>
        <h3 align="center">Enter Product Details</h3>
        <h4>Name:</h4>
        <input type="text" name="name" value="<?php echo $name ?>" required>
        <h4>Price:</h4>
        <input type="number" name="price" value="<?php echo $price ?>"  required>
        <h4>Specifications:</h4>
        <p><?php foreach ($specs as $s) { echo "$s, "; } ?></p>
        <input type="text" name="spec">
        <input type="submit" name="add_spec" value="Add Spec." style="float:left;">
        <br>
        <br>
        <br>
        <br>
        <hr>
        <input type="submit" name="add_product" value="Add Product" style="float:left;">
    </form>
</div>
<?php } ?>
