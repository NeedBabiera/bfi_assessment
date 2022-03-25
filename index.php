<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="gui.css">
    <script src="index.js"> </script>

</head>

<body>

    <div class="grid">
        <!-- ADD SUPPLIER form START -->
        <div class="grid-item">
            <h1>
                <!-- header button -->
                <div class="btn">
                    <a href="customer.php"><input id="btnAddSupp" type="submit" value="ADD SUPPLIER"> </a>
                </div>
            </h1>

        </div>
        <!-- ADD SUPPLIER form END -->

        <!-- ADD CUSTOMER form START -->
        <div class="grid-item">
            <h1>
                <div class="btn">
                    <a href="customer.php"> <input id="btnAddCust" type="submit" value="ADD CUSTOMER"> </a>
                </div>
            </h1>

            <!-- ADD CUSTOMER form END -->

            <!-- ADD PRODUCT form START -->
            <div class="grid-item">
                <h1>
                    <div class="btn">
                        <a href="product.php"> <input id="btnAddProd" type="submit" value="ADD PRODUCT"></a>
                    </div>
                </h1>

            </div>
            <!-- ADD PRODUCT form END -->
            <div class="grid-item">
                <h1>
                    <div class="btn">
                        <a href="salesTransaction.php"> <input id="btnAddProd" type="submit" value="SALES TRANSACTION"></a>
                    </div>
                </h1>

            </div>
        </div>

</body>

</html>