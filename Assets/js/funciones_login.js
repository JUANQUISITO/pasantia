console.log("login");

document.querySelector("#openlogin").addEventListener('click',openModal);

function openModal()
{   
   /* document.querySelector('#idarticulo').value="";
    document.querySelector('.modal-header').classList.replace("headerUpdate","headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info","btn-primary");
    document.querySelector('#btnText').innerHTML="Guardar";
    document.querySelector('#titleModal').innerHTML="Nuevo Producto";
    document.querySelector("#formProducto").reset();
    */
   /*es el trget*/
    $('#modalFormProductos').modal('show');
}

function openForm() {
    document.getElementById("myForm").style.display = "block";
}
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
}