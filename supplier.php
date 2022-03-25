
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //default state of forms
            //document.querySelector('#formSupplier').style.display = "none";

            //button add supplier events
            document.querySelector('#btnAddSupp').onclick = () => {
                document.querySelector('#formSupplier').style.display = "block";
            }
            document.querySelector('#btnSaveSupp').onclick = () => {
                let suppName = document.querySelector()

                document.querySelector('#formSupplier').style.display = "none";


            }
        })

        function checkDelete() {
            return confirm('Delete selected data?');
        }
    </script>
</head>

<body>
    <div class="grid">
        <!-- ADD SUPPLIER form START -->
        <h1>
            <!-- header button -->
            <div class="btn">
                <input id="btnAddSupp" type="submit" value="ADD SUPPLIER">
            </div>
        </h1>
        <!-- form inputs -->
        <form id="formSupplier" method="POST" action="insert.php">
        <div class="txtField">
                <input type="input" placeholder="Supplier Code" name="suppCode" >
            </div>
            <div class="txtField">
                <input type="input"  placeholder="Name or Company" name="suppName" id=>
            </div>
            <div class="txtField">
                <input type="input"  placeholder="Contact No." name="suppContactNo">
            </div>
            <div class="txtField">
                <input type="input"  placeholder="Address" name="suppAddress">
            </div>
            <!-- save button -->
            <div class="btn">
                <input id="btnSaveSupp" type="submit" value="SAVE" name="submitSupp">
            </div>
        </form>
        <!-- ADD SUPPLIER form END -->
    </div>
    <div class="tableData">
        <!-- Table codes START -->
        <form id="dataTbl">
            <table>
                <tbody>
                    <tr>
                        <th>Supplier Code</th>
                        <th>Supplier Name</th>
                        <th>Contact Number</th>
                        <th>Supplier Address</th>
                        <th>Commands</th>
                    </tr>

                    <?php
                    include  "dbConn.php";
                    $sql = "SELECT * FROM `tbl_supplier`";
                    $query = $connection->query($sql);

                    while ($row = $query->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row["supp_code"]; ?></td>
                            <td><?php echo $row["supp_name"]; ?></td>
                            <td><?php echo $row["supp_contactNo"]; ?></td>
                            <td><?php echo $row["supp_address"]; ?></td>
                            <td>
                                <a href="updateSupp.php?editSupp=<?php echo $row["supp_id"]; ?>"> Edit </a>
                                <a href="delete.php?deleteSupp=<?php echo $row["supp_id"]; ?>" onclick='return checkDelete()'>Delete</a>
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
</body>

</html>