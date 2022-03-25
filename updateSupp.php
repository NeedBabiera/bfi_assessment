<?php
 
 include  "dbConn.php";

 if(isset($_POST['updateSupp'])){
    $suppCode = $_POST['suppCode'];
    $suppName = $_POST['suppName'];
    $suppContactNo = $_POST['suppContactNo'];
    $suppAddress = $_POST['suppAddress'];
    $suppId = $_POST['suppId'];

   $sql = " UPDATE `tbl_supplier` SET `supp_code`='$suppCode',`supp_name`= '$suppName',
    `supp_contactNo`= '$suppContactNo',`supp_address`= '$suppAddress' WHERE supp_id = '$suppId' ";

    $result = $connection->query($sql);

    if($result == TRUE){
        #echo "Supplier added successfully";
        echo '<script type="text/javascript"> alert(Data updated successfully) </script>';
        header('location:supplier.php');
    }else if($result == false && $sql != ""){
        echo "Error:". $sql . "<br>" . $connection->error; 
    }
}

 if(isset($_GET['editSupp'])){
     $id = $_GET['editSupp'];
     
     $sql = "SELECT * FROM `tbl_supplier` where supp_id = '$id'" ;
     $getQry = $connection->query($sql);

    if($getQry-> num_rows > 0){
        while($row = $getQry -> fetch_assoc()){
            $suppId = $row['supp_id'];
            $suppCode = $row['supp_code'];
            $suppName = $row['supp_name'];
            $suppContactNo = $row['supp_contactNo'];
            $suppAddress = $row['supp_address'];
        }
       
    }
  
 }

 $connection->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="grid">
        <!-- ADD SUPPLIER form START -->
        <!-- form inputs -->
        <form id="formSupplier" method="POST">
        <input type="hidden" value="<?php echo $suppId; ?>" name="suppId">
        <div class="txtField">
                <input type="input" value="<?php echo $suppCode; ?>" placeholder="Supplier Code" name="suppCode">
        </div>
        <div class="txtField">
            <input type="input" value="<?php echo $suppName; ?>" placeholder="Name or Company" name="suppName">
        </div>
        <div class="txtField">
            <input type="input" value="<?php echo $suppContactNo; ?>"  placeholder="Contact No." name="suppContactNo">
        </div>
        <div class="txtField">
            <input type="input" value="<?php echo $suppAddress; ?>" placeholder="Address" name="suppAddress">
        </div>
        <!-- save button -->
        <div class="btn">
            <input id="btnSaveSupp" type="submit" value="UPDATE" name="updateSupp">
        </div>
        </form>
        <!-- ADD SUPPLIER form END -->
    </div>
</body>
</html>