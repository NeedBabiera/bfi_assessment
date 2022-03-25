document.addEventListener('DOMContentLoaded',function(){
    //default state of supplier form
    document.querySelector('#formSupplier').style.display = "none";
    //button add product event
    document.querySelector('#btnAddProd').onclick = () => {
        document.querySelector('#formSupplier').style.display = "block";
    }
    //button save product event
    document.querySelector('#btnSaveProd').onclick = () =>{
        document.querySelector('#formSupplier').style.display = "none";
    }
})