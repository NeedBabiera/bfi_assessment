<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //default state of forms
            //document.querySelector('#formProduct').style.display = "none";
            //button add product events

            document.querySelector('#btnAddProd').onclick = () => {
                document.querySelector('#formProduct').style.display = "block";
            }
            document.querySelector('#btnSaveProd').onclick = () => {
                document.querySelector('#formProduct').style.display = "none";
            }
        })
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
            <form id="formProduct" method="POST" action="insert.php">
                <select id="suppList" name="suppId">

                    <option value="">--Select Supplier--</option>
                    <?php
                    include  "dbConn.php";
                    $sql = "SELECT * FROM `tbl_supplier`";
                    $query = $connection->query($sql);

                    while ($row = $query->fetch_assoc()) {
                    ?>
                        <option value=<?php echo $row["supp_id"] ?>><?php echo $row["supp_name"]; ?></option>
                    <?php
                    }
                    ?>

                </select>
                <div class="txtField">
                    <input type="input" placeholder="Barcode" name="prodBarcode">
                </div>
                <div class="txtField">
                    <input type="input" placeholder="Description" name="prodDesc">
                </div>
                <div class="txtField">
                    <input type="input" placeholder="Quantity" name="prodQty">
                </div>
                <div class="txtField">
                    <input type="input" placeholder="Product Unit Cost" name="prodUnitCost">
                </div>
                <div class="txtField">
                    <input type="input" placeholder="Product Unit Price" name="prodUnitPrice">
                </div>
                <div class="btn">
                    <input id="btnSaveProd" type="submit" value="SAVE" name="submitProd">
                </div>
            </form>
        </div>
        <!-- ADD PRODUCT form END -->
    </div>

    <div class="grid">
        <div class="main">
            <!-- Table codes START -->
            <form id="dataTbl">
                <table>
                    <tbody>
                        <tr>
                            <th>Supplier</th>
                            <th>Product Description</th>
                            <th>Quantity</th>
                            <th>Product Cost</th>
                            <th>Product Unit Price</th>
                            <th>Command</th>
                        </tr>

                        <?php
                        include  "dbConn.php";
                        $sql = "SELECT * FROM `tbl_prod` 
                        INNER JOIN tbl_supplier ON tbl_supplier.supp_id = tbl_prod.supp_id";
                        $query = $connection->query($sql);

                        while ($row = $query->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row["supp_name"]; ?></td>
                                <td><?php echo $row["prod_desc"]; ?></td>
                                <td><?php echo $row["prod_qty"]; ?></td>
                                <td><?php echo $row["prod_cost"]; ?></td>
                                <td><?php echo $row["prod_price"]; ?></td>
                                <td>
                                    <a href="updateProd.php?editProd=<?php echo $row["prod_id"]; ?>"> Edit </a>
                                    <a href="delete.php?deleteProd=<?php echo $row["prod_id"]; ?>" onclick='return checkDelete()'>Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </form>

            <!-- Table codes END -->
        </div>
    </div>
</body>

</html>