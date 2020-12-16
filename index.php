<?php
   if(!isset($_COOKIE["valid"])){
       header("location: login.php");
   }
   else{ 
    $conn = mysqli_connect('localhost','root','','cosmetics_shop') or die('Unable To connect');
    if (isset($_POST['delete'])) {
        $id=$_POST['id'];
        $sql = "DELETE FROM products WHERE id = '$id'";
        $conn->query($sql);
    }
    include 'header.php';?>
<div class="container-fluid" style="margin-top:100px;">
    <table>
        <tr><td>#</td><td>Name</td><td>Price</td><td>Specifications</td></tr>
        <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
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
                    <td style="width:20px;align-content: center;vertical-align: center;">
                        <form method="post" action="index.php" style="align-content: center;vertical-align: center;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete" style="background-color: red;font-size: .7rem;">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
            $count++;
            }
        }
        ?>
    </table>
    
</div>
<?php } ?>
