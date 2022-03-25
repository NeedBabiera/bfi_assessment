<?php
 
 session_start();
 include  "dbConn.php";


 if(isset($_POST['submitSales'])){
     $tblPurchase = $_POST['tblPurchase'];

     echo $tblPurchase;


 }

 
 $connection->close();
