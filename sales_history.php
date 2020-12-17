<?php
   session_start();
   if(!isset($_COOKIE["valid"])){
    header("location: login.php");
   }
   else{ 
    $conn = mysqli_connect('localhost','root','','cosmetics_shop') or die('Unable To connect');
    if (isset($_POST['sell'])) {
        if (isset($_POST['quant'])) {
            $id = $_POST['id'];
            $quant = $_POST['quant'];
            $sql = "INSERT INTO sales_hist (product_id, quantity) VALUES ('$id', '$quant')";
            $conn->query($sql);
        }
    }
    include 'header.php';?>
<div class="container-fluid" style="margin-top:100px;">
    <table>
        <tr><td>#</td><td>Name</td><td>Time</td><td>Quantity</td><td>Price</td><td>Total</td></tr>
        <?php
        $sql = "SELECT * FROM sales_hist ORDER BY id DESC LIMIT 15";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $count = 1;
            while($row = $result->fetch_assoc()) {
                $id = $row['product_id'];
                $sql = "SELECT * FROM products WHERE id = '$id'";
                $result2 = $conn->query($sql);
                if ($result2->num_rows > 0) {
                    $row2 = $result2->fetch_assoc();
                    $total = $row['quantity']*$row2['price'];
                ?>
                <tr><td><?php echo $count; ?></td><td><?php echo $row2['name']; ?></td><td><?php echo $row['date_time']; ?></td><td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row2['price']; ?></td><td><?php echo $total; ?></td></tr>
                <?php
                }
            $count++;
            }
        }
        ?>
    </table>
    
</div>
<?php } ?>
