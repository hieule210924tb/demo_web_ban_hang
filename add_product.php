<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>
<body>
    <h1>Nhập thêm sản phẩm</h1>
    <form action="" method="post">
        Mã sản phẩm : <input type="number" name="id_product"> <br>
        Tên sản phẩm : <input type="text" name="name_product"> <br>
        Giá sản phẩm: <input type="number" name="price"> <br>
        Mô tả : <input type="text" name="description"> <br>
        Ảnh sản phẩm : <input type="file" name="image_url"> <br>
        Danh mục: <select name="id_category" >
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

        <input type="submit" value="Thêm">
     </form>
     <?php
       require './connect.php';
        $id_product = $_POST['id_product'];
        $name_product = $_POST['name_product'];
        $price = $_POST['price'];
        $description= $_POST['description'];
        $id_category= $_POST['id_category'];
        $image_url = $_POST['image_url'];
        $sql = "INSERT INTO `products` (`id_product`, `name_product`, `price`, `description`, `id_category`, `image_url`)
         VALUES ('$id_product', '$name_product', '$price', '$description', '$id_category', '$image_url')";
        if ($conn->query($sql) === TRUE) {
            header("location:table_product.php");
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        };
        $conn->close();
     ?>
</body>
</html>