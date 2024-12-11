<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục sản phẩm</title>
</head>
<body>
<h1>Thêm danh mục sản phẩm</h1>
    <form action="" method="post">
        Mã danh mục : <input type="number" name="id_category"> <br>
        Tên danh mục : <input type="text" name="name"> <br>
        <input type="submit" name="Thêm" id="">
     </form>
     <?php
       require './connect.php';
        $id_category = $_POST['id_category'];
        $name = $_POST['name'];
        $sql = "INSERT INTO categories( id_category, name)
        VALUES('$id_category  ','$name')";
        if ($conn->query($sql) === TRUE) {
        echo "Bạn đã thêm thành công";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        };
        $conn->close();
     ?>
</body>
</html>