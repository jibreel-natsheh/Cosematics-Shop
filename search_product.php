<?php
   if(!isset($_COOKIE["valid"])){
       header("location: login.php");
   }
   else{ 
    $conn = mysqli_connect('localhost','root','','cosmetics_shop') or die('Unable To connect');
    if(isset($_POST['search'])){
        $text = '';
        if(isset($_POST['search_bar'])){
            $text = $_POST['search_bar'];
        }
        $sql = "SELECT * FROM products WHERE name = '$text' OR price = '$text' OR id IN (SELECT product_id FROM products_spec WHERE spec = '$text')";
        $result = $conn->query($sql);
    }
    include 'header.php';?>
<div class="container-fluid" style="margin-top:100px;">
    <div>
        <form action="" method="post">
            <h4>Search for a product</h4>
            <input type="text" name="search_bar">
            <input type="submit" name="search" value="Search" style="float:left;">
        </form>
    </div>
    <table>
        <tr><td>#</td><td>Name</td><td>Price</td><td>Specifications</td></tr>
        <?php
        if(isset($result)){
            if ($result->num_rows > 0) {
                $count = 1;
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tr><td><?php echo $count; ?></td><td><?php echo $row['name']; ?></td><td><?php echo $row['price']; ?></td><td>
                        <?php
                        $id = $row['id'];
                        $sql = "SELECT * FROM products_spec WHERE product_id = '$id'";
                        $result2 = $conn->query($sql);
                        if ($result2->num_rows > 0) {
                            while($row2 = $result2->fetch_assoc()) {
                            ?><p><?php echo $row2['spec'] ?></p>
                            <?php
                            }
                        }
                        ?>
                        </td>
                    </tr>
                    <?php
                $count++;
                }
            }
        }
        ?>
    </table>
    
</div>
<?php } ?>
