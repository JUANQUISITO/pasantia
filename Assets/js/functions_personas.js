console.log("funcion personas");




function EditarPersona(idPersona)
{   
    console.log(idPersona);
    //cambio de labels y botones
    document.querySelector('#staticBackdropLabel').innerHTML = "Actualizar "; 
    document.querySelector('#btn-edit').innerHTML = " Actualizar";

    // var id = idRol;
    // var request = new XMLHttpRequest();
    // var ajaxUrl = base_url+'Roles/editar/'+id;
    
    // request.open("GET",ajaxUrl,true);
    // request.send();
    // request.onreadystatechange = function()
    // {
    //     if(this.readyState == 4 && this.status == 200)
    //     {
    //         var objData = JSON.parse(this.responseText);
    //         if(objData.status)
    //         {
    //             document.querySelector("#idRoles").value = objData.data.id_rol;
    //             document.querySelector("#nombrerol").value = objData.data.nombre;
    //             document.querySelector("#descripcion").value = objData.data.descripcion;
    //         }
    //     }
    // }
    $('#modalFormPersona').modal('show');

}