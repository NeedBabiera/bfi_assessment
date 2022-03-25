<?php

include  "dbConn.php";
if (isset($_POST['updateCust'])) {

    $custId = $_POST['custId'];
    $custName = $_POST['custName'];
    $custAddress = $_POST['custAddress'];
    $custContactNo = $_POST['custContactNo'];

    $sql = " UPDATE `tbl_customer` 
    SET `cust_name`='$custName',`cust_address`=' $custAddress',`cust_contactNo`='$custContactNo' WHERE cust_id = '$custId' ";

    $result = $connection->query($sql);

    if ($result == TRUE) {
        #echo "Supplier added successfully";
        echo '<script type="text/javascript"> alert(Data updated successfully) </script>';
        header('location:customer.php');
    } else if ($result == false) {
        echo "Error:" . $sql . "<br>" . $connection->error;
    }
}
if (isset($_GET['editCust'])) {
    $id = $_GET['editCust'];

    $sql = "SELECT * FROM `tbl_customer` where cust_id = '$id'";
    $getQry = $connection->query($sql);

    if (!empty($getQry) && $getQry->num_rows > 0) {
        while ($row = $getQry->fetch_assoc()) {
            $custId = $row['cust_id'];
            $custName = $row['cust_name'];
            $custAddress = $row['cust_address'];
            $custContactNo = $row['cust_contactNo'];
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
    <title>Customer</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="grid">
        <!-- ADD CUSTOMER form START -->
        <div class="grid-item">
            <form id="formCustomer" method="POST">
                <input type="hidden" value="<?php echo $custId; ?>" name="custId">
                <div class="txtField">
                <input type="input" value="<?php echo $custName; ?>" placeholder="Name" name="custName">
                </div>
                <div class="txtField">
                    <input type="input" value="<?php echo $custAddress; ?>" placeholder="Address" name="custAddress">
                </div>
                <div class="txtField">
                    <input type="input" value="<?php echo $custContactNo; ?>" placeholder="Contact Number" name="custContactNo">
                </div>
                <div class="btn">
                    <input id="btnCustomer" type="submit" value="UPDATE" name="updateCust">
                </div>
            </form>
        </div>
        <!-- ADD CUSTOMER form END -->
    </div>
</body>

</html>