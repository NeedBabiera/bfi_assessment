<?php
 
 include  "dbConn.php";


 if(isset($_GET['deleteSupp'])){
     $id = $_GET['deleteSupp'];
     
    $sql = "DELETE FROM tbl_supplier where supp_id = '$id'";
    $result =mysqli_query($connection,$sql);
    if($result == TRUE){
      header('location:supplier.php');
   }else if($result == false && $sql != ""){
      echo "Error:". $sql . "<br>" . $connection->error; 
   }

 }else if(isset($_GET['deleteCust'])){
   $id = $_GET['deleteCust'];
     
   $sql = "DELETE FROM tbl_customer where cust_id = '$id'";
   $result =mysqli_query($connection,$sql);
   if($result == TRUE){
     header('location:customer.php');
  }else if($result == FALSE){
     echo "Error:". $sql . "<br>" . $connection->error; 
  }
 }else if(isset($_GET['deleteProd'])){
   $id = $_GET['deleteProd'];
     
   $sql = "DELETE FROM tbl_prod where prod_id = '$id'";
   $result =mysqli_query($connection,$sql);
   if($result == TRUE){
     header('location:product.php');
  }else if($result == FALSE){
     echo "Error:". $sql . "<br>" . $connection->error; 
  }
 }

 $connection->close();

?>