<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng sản phẩm</title>
</head>
<style>
    a{
        text-decoration: none;
    }
    body{
        display: flex;
        flex-direction: column;
        align-self: center;
    }
    img{
        width: 100px;
        height: 100px;
    }
    table{
        border: 1px solid #ccc;
        text-align: center;
    }
    th,td{
        border: 1px solid #ccc;
    }
    .chuc_nang{
        display: flex;
        justify-content: space-around;
        border: none;
    }
    .add_product{
        display: flex;
        width: 105px;
        align-items: center;
        justify-content: center;
        height: 45px;
        text-align: center;
        border-radius: 10px;
        background-color: #6bb86a;
    }
</style>
<body>
<?php require './connect.php' ?>
<!-- Tìm kiếm sản phẩm -->
<form action="./search_product.php" method="post">
         Danh mục : <input type="text" name="name_category"> 
         <input type="submit" value="Tìm kiếm">
     </form>

  <!-- Hiển thị sản phẩm -->
      <table>
      <caption> <b>Thông tin sản phẩm</b></caption>
        <tr> 
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>Danh mục</th>
            <th>Ảnh</th>
            <th>Chức năng</th>
        </tr>
        <?php
       mysqli_set_charset($conn,'UTF-8');
       $sql = "SELECT `id_product`,`name_product`, `price`, `description`, `name`, `image_url`
        FROM `products` 
        INNER JOIN categories ON categories.id_category = products.id_category;";
        $result= $conn->query($sql);
        if($result-> num_rows>0){
            for($i=0;$i<$result ->num_rows;$i++){
                $row = $result->fetch_assoc();
                echo "<tr>";
                echo  
                    "<td>" .$row['name_product']."</td>".
                    "<td>" .$row['price']."</td>".
                    "<td>" .$row['description'] ."</td>".
                    "<td>" .$row['name'] ."</td>".
                    "<td>".'<img src="./img/'.$row['image_url'].'">'."</td>".
                    "<td class='chuc_nang'>" .
                       '<a class="update" href="http://localhost/php/demo_web_ban_hang/form-update_product.php?id_product='.$row['id_product'].'">Sửa</a>'.
                       '<a class="delete" href="http://localhost/php/demo_web_ban_hang/delete.php?id_product='.$row['id_product'].'">Xóa</a>'.
                    "</td>";
                 echo   "</tr>";
                }
            }
          ?>
      </table>

      <div class="add_product"><a href="./add_product.php">Thêm sản phẩm</a></div>
</body>
</html>