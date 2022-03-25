<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Transaction</title>
    <link rel="stylesheet" href="salesStyles.css">
    <script src="salesTransaction.js"> </script>
</head>

<body>
    <div class="sales-header">
        <input type="submit" value="NEW TRANSACTION">
        <input type="text" id="txtCustomer">
        <input type="text" id="txtCustomerId">
    </div>
    <div class="sales-table:after">
        <div class="sales-table">
            <!-- PURCHASE TABLE-->
            <input type="text" id="prodDesc">
            <input type="text" id="prodPrice">
            <input type="text" placeholder="Enter Quantity" id="prodQty">
            <input type="text" id="prodId">
            <input type="submit" id="addProd" onclick="addHtmlTableRow()">
            <table id="tblPurchase">
                <tr>
                    <thead>
                        <th>Product ID</th>
                        <th>Product Description</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Sub Total</th>
                    </thead>
                </tr>
                <tbody>
                </tbody>
            </table>
            <div class="txtTotal">
                <input id="btnSave" type="submit" value="SAVE" name="submitSales">
                <input id="totalPurchase" type="text" placeholder="TOTAL:">
            </div>

        </div>

        <!-- CUSTOMER AND PRODUCT TABLE-->
        <div class="customer-table">
            <!-- CUSTOMER TABLE-->
            <input type="submit" value="ADD CUSTOMER" id="btnCustomer" placeholder="Customer">
            <form id="formCustomer">
                <table id="tblCustomer">
                    <tbody>
                        <tr>
                            <th>Customer Name </th>
                            <th>Customer ID </th>
                        </tr>
                        <?php
                        include  "dbConn.php";
                        $sql = "SELECT * FROM `tbl_customer`";
                        $query = $connection->query($sql);

                        while ($row = $query->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row["cust_name"]; ?></td>
                                <td><?php echo $row["cust_id"]; ?></td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
                <input type="submit" value="CANCEL" id="btnCancelCust">
            </form>
            <!-- END CUSTOMER TABLE-->
            <!-- PRODUCT TABLE-->
            <input type="submit" value="ADD Product" id="btnProduct">
            <form id="formProduct">
                <table id="tblProduct">
                    <tbody>
                        <tr>
                            <th>Product</th>
                            <th>Unit Price</th>
                        </tr>
                        <?php
                        include  "dbConn.php";
                        $sql = "SELECT * FROM `tbl_prod` where prod_qty > 0";
                        $query = $connection->query($sql);

                        while ($row = $query->fetch_assoc()) {
                        ?>
                            <tr>
                                <td id><?php echo $row["prod_desc"]; ?></td>
                                <th><?php echo $row["prod_price"]; ?></th>
                                <th><?php echo $row["prod_id"]; ?></th>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <input type="submit" value="CANCEL" id="btnCancelProd">
            </form>
            <!-- END PRODUCT TABLE-->
            <!-- END CUSTOMER AND PRODUCT TABLE-->
        </div>

</body>

</html>