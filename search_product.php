<?php
  require './connect.php';
  mysqli_set_charset($conn, 'UTF8');
  $name_category = $_POST['name_category'];
  $sql = "SELECT `id_product`, `name_product`, `price`, `description`, `name`, `image_url`
   FROM `products` INNER JOIN categories ON categories.id_category = products.id_category  
    WHERE `name` LIKE '%$name_category%'";

   $result = $conn->query($sql);

   if($result->num_rows >0){
    for($i =0 ; $i < $result ->num_rows ; $i++){
        $row= $result->fetch_assoc();  ?>
         <table>
         <tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Mô tả </th>
            <th>Danh mục</th>
            <th>Ảnh</th>
        </tr>
        <tr> 
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['description'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><img width="100px" height="100px" class="image_url" src="img/<?php echo $row['image_url'] ?>" ></td>
        </tr>
         </table>
  <?php } ?>
<?php } ?>
