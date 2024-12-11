<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật dữ liệu</title>
</head>
<body>
    <?php
        require './connect.php';
            $id_product = $_GET['id_product'];
            $sql = "SELECT * FROM products WHERE id_product='$id_product'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
    ?>
   <h1>Sửa dữ liệu sản phẩm</h1>
   <form action="./xyly_update.php" method="post">
        <input type="hidden" name="id_product"> <br>
        Tên sản phẩm : <input type="text" name="name_product" value="<?php echo $row['name_product'] ?>"> <br>
        Giá sản phẩm: <input type="number" name="price" value="<?php echo $row['price'] ?>"> <br>
        Mô tả : <input type="text" name="description" value="<?php echo $row['description'] ?>"> <br>
        Ảnh sản phẩm : <input type="file" name="image_url" value="<?php echo $row['image_url'] ?>"> <br>
        Danh mục: <select name="id_category" value="<?php echo $row['id_category'] ?>" >
        <?php
           require './connect.php';
           $sql= "SELECT * FROM categories";
           $result = $conn->query($sql);
           if($result->num_rows > 0){
            for($i = 0; $i < $result->num_rows; $i++){
                $row = $result->fetch_assoc();
                $id_category = $row['id_category'];
                $name=$row['name'];
                echo   "<option value='$id_category'>$name</option>";
            }
        }     
        ?>            
        </select> <br>
        <input type="submit" value="Sửa">
    </form>
    
</body>
</html>