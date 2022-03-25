document.addEventListener('DOMContentLoaded', function () {
    //default state of supplier form
    document.querySelector('#formCustomer').style.display = "none";
    document.querySelector('#formProduct').style.display = "none";
    //button add customer event
    document.querySelector('#btnCustomer').onclick = () => {
        document.querySelector('#formCustomer').style.display = "block";
        document.querySelector('#btnProduct').style.display = "none";
    }
    //button close customer event
    document.querySelector('#btnCancelCust').onclick = () => {
        document.querySelector('#formCustomer').style.display = "none";
    }
    //button add product event
    document.querySelector('#btnProduct').onclick = () => {
        document.querySelector('#formProduct').style.display = "block";
    }
    //button close product event
    document.querySelector('#btnCancelProd').onclick = () => {
        document.querySelector('#formProduct').style.display = "none";
    }

    var table = document.getElementById('tblProduct');
    var tblPurchase = document.getElementById('#tblPurchase');
    for (var i = 0; i < table.rows.length; i++) {
        table.rows[i].onclick = function () {
            //rIndex = this.rowIndex;
            document.getElementById("prodDesc").value = this.cells[0].innerHTML;
            document.getElementById("prodPrice").value = this.cells[1].innerHTML;
            document.getElementById("prodId").value = this.cells[2].innerHTML;

        };



    }

    var tableCUst = document.getElementById('tblCustomer');
    for (var i = 0; i < tblCustomer.rows.length; i++) {
        tblCustomer.rows[i].onclick = function () {
            //rIndex = this.rowIndex;
            document.getElementById("txtCustomer").value = this.cells[0].innerHTML;
            document.getElementById("txtCustomerId").value = this.cells[1].innerHTML;


        };
    }

})

function addHtmlTableRow() {
    var sumVal = 0;
    var tblPurchase = document.getElementById('tblPurchase');
    var newRow = tblPurchase.insertRow(tblPurchase.length),
        cell1 = newRow.insertCell(0),
        cell2 = newRow.insertCell(1),
        cell3 = newRow.insertCell(2),
        cell4 = newRow.insertCell(3),
        cell5 = newRow.insertCell(4),
        prodDesc = document.getElementById("prodDesc").value,
        prodPrice = document.getElementById("prodPrice").value;
    prodQty = document.getElementById("prodQty").value;
    prodId = document.getElementById("prodId").value;
    cell1.innerHTML = prodId;
    cell2.innerHTML = prodDesc;
    cell3.innerHTML = prodQty;
    cell4.innerHTML = prodPrice;
    cell5.innerHTML = prodQty * prodPrice;
    

    for (var i = 1; i < tblPurchase.rows.length; i++) {
        sumVal = sumVal + parseInt(tblPurchase.rows[i].cells[3].innerHTML);
    }
    console.log(sumVal);
}

function addCustomer() {
    var sumVal = 0;
    var tblCustomer = document.getElementById('tblCustomer');
    var newRow = tblCustomer.insertRow(tblCustomer.length),
        cell1 = newRow.insertCell(0)
    customer = document.getElementById("tblCustomer").value,
        prodQty = document.getElementById("prodQty").value;

    cell1.innerHTML = prodDesc;
    cell2.innerHTML = prodQty;
    cell3.innerHTML = prodPrice;
    cell4.innerHTML = prodQty * prodPrice;

    for (var i = 1; i < tblPurchase.rows.length; i++) {
        sumVal = sumVal + parseInt(tblPurchase.rows[i].cells[3].innerHTML);
    };
    console.log(sumVal);
}




