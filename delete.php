<?php
   require './connect.php';
   mysqli_set_charset($conn, 'UTF8');
   $id_product = $_GET['id_product'];
   $sql = "DELETE FROM products WHERE id_product='$id_product'";

   if($conn->query($sql)){
      echo "Bạn đã xóa";
   } else{
    echo "Error" .$sql ."<br>" .$conn->errno;
   };
   header("location:table_product.php")
?>