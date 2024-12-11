<?php
    require './connect.php';
        $id_product = $_POST['id_product'];
        $name_product = $_POST['name_product'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image_url = $_POST['image_url'];
        $id_category = $_POST['id_category'];
    
        $sql = "UPDATE `products`
                SET `name_product` = '$name_product',`price` = '$price',`description` = '$description',`image_url` = '$image_url',`id_category` = '$id_category'
                WHERE `products`.`id_product` = '$id_product'";
        if($conn->query($sql)){
            echo "Cập nhật thành công";
        }else{
           echo "Lỗi: " . $conn->error;
        }
        header("location:table_product.php")
?>