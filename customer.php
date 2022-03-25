<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        document.addEventListener('DOMContentLoaded',function(){
            //default state of forms
            //document.querySelector('#formCustomer').style.display = "none";

            //button add customer events
            document.querySelector('#btnAddCust').onclick = () => {
                document.querySelector('#formCustomer').style.display = "block";
            }
            document.querySelector('#btnCustomer').onclick = () =>{
                document.querySelector('#formCustomer').style.display = "none";
            }
        })

        function checkDelete() {
            return confirm('Delete selected data?');
        }
    </script>
</head>
<body>
    <div class="grid">
          <!-- ADD CUSTOMER form START -->
    <div class="grid-item">
        <h1>  
            <div class="btn">
            <input id="btnAddCust" type = "submit" value="ADD CUSTOMER">
            </div>
        </h1>
        <form id="formCustomer" method="POST" action="insert.php"> 
                <div class="txtField">
                    <input type = "input" placeholder="Name" name="custName">
                </div>
                <div class="txtField">
                    <input type = "input" placeholder="Address" name="custAddress">
                </div >
                <div class="txtField">
                    <input type = "input" placeholder="Contact Number" name="custContactNo">
                </div>
                <div class="btn">
                    <input id="btnCustomer" type = "submit" value="SAVE" name="submitCust">
                </div>
        </form>
    </div>
    <!-- ADD CUSTOMER form END -->
    </div>
    <div class="tableData">
        <!-- Table codes START -->
        <form id="dataTbl">
            <table>
                <tbody>
                    <tr>
                        <th>Customer Name Code</th>
                        <th>Customer Address</th>
                        <th>Customer Number</th>
                        <th>Commands</th>
                    </tr>

                    <?php
                    include  "dbConn.php";
                    $sql = "SELECT * FROM `tbl_customer`";
                    $query = $connection->query($sql);

                    while ($row = $query->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row["cust_name"]; ?></td>
                            <td><?php echo $row["cust_address"]; ?></td>
                            <td><?php echo $row["cust_contactNo"]; ?></td>
                            <td>
                                <a href="updateCust.php?editCust=<?php echo $row["cust_id"]; ?>"> Edit </a>
                                <a href="delete.php?deleteCust=<?php echo $row["cust_id"]; ?>" onclick='return checkDelete()'>Delete</a>
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