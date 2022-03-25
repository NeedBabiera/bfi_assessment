<?php
 
 session_start();
 include  "dbConn.php";

 $suppCode = "";
 $suppName = "";
 $suppContactNo = "";
 $suppAddress = "";

 $sql = "";
 $result  = false;

 if(isset($_POST['submitSupp'])){
     $suppName = $_POST['suppName'];
     $suppContactNo = $_POST['suppContactNo'];
     $suppAddress = $_POST['suppAddress'];

    $sql = "INSERT INTO `tbl_supplier`(`supp_code`, `supp_name`, `supp_contactNo`, `supp_address`) 
       VALUES ('$suppName','$suppName', '$suppContactNo' ,' $suppAddress')";

       $result = $connection->query($sql);
       if($result == TRUE ){
         #echo "Supplier added successfully";
         header('location:supplier.php');
      }else if($result == false && $sql != ""){
         echo "Error:". $sql . "<br>" . $connection->error; 
      }

 }else if(isset($_POST['submitCust'])){
    $custName = $_POST['custName'];
    $custAddress = $_POST['custAddress'];
    $custContactNo = $_POST['custContactNo'];

    $sql = "INSERT INTO `tbl_customer`(`cust_name`, `cust_address`, `cust_contactNo`) 
    VALUES ('$custName','$custAddress','$custContactNo')";

   $result = $connection->query($sql);

   if($result == TRUE){
      #echo "Supplier added successfully";
      header('location:customer.php');
   }else if($result == false && $sql != ""){
      echo "Error:". $sql . "<br>" . $connection->error; 
   }

 }else if(isset($_POST['submitProd'])){
    $suppId = $_POST['suppId'];
    $prodSupp = $_POST['prodSupp'];
    $prodBarcode = $_POST['prodBarcode'];
    $prodDesc = $_POST['prodDesc'];
    $prodQty = $_POST['prodQty'];
    $prodUnitCost = $_POST['prodUnitCost'];
    $prodUnitPrice = $_POST['prodUnitPrice'];

    $sql = "INSERT INTO `tbl_prod`(`prod_barcode`, `prod_desc`, `prod_qty`, `prod_cost`, `prod_price`, `supp_id`) 
        VALUES ('$prodBarcode','$prodDesc','$prodQty','$prodUnitCost','$prodUnitPrice','$suppId')";
   
   $result = $connection->query($sql);

   if($result == TRUE){
      #echo "Supplier added successfully";
      header('location:product.php');
   }else if($result == false){
      echo "Error:". $sql . "<br>" . $connection->error; 
   }
 }

 
 $connection->close();
