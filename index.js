document.addEventListener('DOMContentLoaded',function(){
    //default state of forms
    document.querySelector('#formSupplier').style.display = "none";
    document.querySelector('#formProduct').style.display = "none";
    document.querySelector('#formCustomer').style.display = "none";
    //button add supplier eventsindex
    document.querySelector('#btnAddSupp').onclick = () => {
        document.querySelector('#formSupplier').style.display = "block";
      
    }
    document.querySelector('#btnSaveSupp').onclick = () =>{
        document.querySelector('#formSupplier').style.display = "none";
    }

    //button add product events
    document.querySelector('#btnAddProd').onclick = () => {
        document.querySelector('#formProduct').style.display = "block";
    }
    document.querySelector('#btnSaveProd').onclick = () =>{
        document.querySelector('#formProduct').style.display = "none";
    }

      //button add customer events
      document.querySelector('#btnAddCust').onclick = () => {
        document.querySelector('#formCustomer').style.display = "block";
    }
    document.querySelector('#btnCustomer').onclick = () =>{
        document.querySelector('#formCustomer').style.display = "none";
    }
})