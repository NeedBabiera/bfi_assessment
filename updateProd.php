<?php

include  "dbConn.php";
if (isset($_POST['updateProd'])) {

    $prodId = $_POST['prodId'];
    $prodBarcode = $_POST['prodBarcode'];
    $prodDesc = $_POST['prodDesc'];
    $prodQty = $_POST['prodQty'];
    $prodUnitCost = $_POST['prodUnitCost'];
    $prodUnitPrice = $_POST['prodUnitPrice'];
    $suppId = $_POST['suppId'];

    $sql = "UPDATE `tbl_prod` SET `prod_barcode`='$prodBarcode',`prod_desc`='$prodDesc',
    `prod_qty`='$prodQty',`prod_cost`='$prodUnitCost',`prod_price`='$prodUnitPrice',
    `supp_id`='$suppId' WHERE `prod_id`='$prodId'";
    $result = $connection->query($sql);

    if ($result == TRUE) {
        #echo "Supplier added successfully";
        echo '<script type="text/javascript"> alert(Data updated successfully) </script>';
        header('location:product.php');
    } else if ($result == false) {
        echo "Error:" . $sql . "<br>" . $connection->error;
    }
}
if (isset($_GET['editProd'])) {
    $id = $_GET['editProd'];

    $sql = "SELECT * FROM tbl_prod 
    INNER JOIN tbl_supplier ON tbl_supplier.supp_id = tbl_prod.supp_id
    WHERE tbl_prod.prod_id = '$id'";
    $getQry = $connection->query($sql);

    if (!empty($getQry) && $getQry->num_rows > 0) {
        while ($row = $getQry->fetch_assoc()) {
            $prodId = $row['prod_id'];
            $prodBarcode = $row['prod_barcode'];
            $prodDesc = $row['prod_desc'];
            $prodQty = $row['prod_qty'];
            $prodUnitCost = $row['prod_cost'];
            $prodUnitPrice = $row['prod_price'];
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
    <title>Product Update</title>
    <link rel="stylesheet" href="styles.css">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector("#suppList").disabled = true;

        })

        function enabler() {
            if (document.querySelector("#suppList").disabled = true) {
                document.querySelector("#suppList").disabled = false;
            } else {
                document.querySelector("#suppList").disabled = true;
            }
        }
    </script>
</head>

<body>
    <div class="grid">
        <!-- ADD PRODUCT form START -->


        <div class="grid-item">
            <h1>
                <div class="btn">
                    <input id="btnAddProd" type="submit" value="ADD PRODUCT">
                </div>
            </h1>
            <form id="formProduct" method="POST" action="">

                <select id="suppList" name="suppId">
                    <?php

                    include  "dbConn.php";
                    $sql = "";

                    if (isset($_POST['changeSupp'])) {
                        $sql = "SELECT * FROM `tbl_supplier`";
                    } else {
                        $sql = "SELECT * FROM tbl_prod 
                        INNER JOIN tbl_supplier ON tbl_supplier.supp_id = tbl_prod.supp_id
                        WHERE tbl_prod.prod_id = '$id'";
                    }
                    $query = $connection->query($sql);
                    while ($row = $query->fetch_assoc()) {
                    ?>
                        <option value=<?php echo $row["supp_id"] ?>><?php echo $row["supp_name"]; ?></option>
                    <?php
                    }
                    ?>
                </select>

                <input type="submit" id="changeSupp" onclick='enabler()' value="Change Supplier" name="changeSupp">

                <input type="hidden" value="<?php echo $prodId; ?>" name="prodId">

                <div class="txtField">
                    <input type="input" value="<?php echo $prodBarcode; ?>" placeholder="Barcode" name="prodBarcode" id="prodBarcode">
                </div>
                <div class="txtField">
                    <input type="input" value="<?php echo $prodDesc; ?>" placeholder="Description" name="prodDesc">
                </div>
                <div class="txtField">
                    <input type="input" value="<?php echo $prodQty; ?>" placeholder="Quantity" name="prodQty">
                </div>
                <div class="txtField">
                    <input type="input" value="<?php echo $prodUnitCost; ?>" placeholder="Product Unit Cost" name="prodUnitCost">
                </div>
                <div class="txtField">
                    <input type="input" value="<?php echo $prodUnitPrice; ?>" placeholder="Product Unit Price" name="prodUnitPrice">
                </div>
                <div class="btn">
                    <input id="btnSaveProd" type="submit" value="UPDATE" name="updateProd">
                </div>
            </form>
        </div>
        <!-- ADD PRODUCT form END -->
    </div>

</body>

</html>