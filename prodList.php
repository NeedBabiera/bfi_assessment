<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="salesStyles.css">
    <script> </script>
</head>

<body>

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
                                    <a href="updateProd.php?editProd=<?php echo $row["prod_id"]; ?>">
                                        <input type="submit" id="prodAdd" value="ADD"> </a>
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