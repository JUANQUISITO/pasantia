
console.log("registro de estudiantes");

let registro_estudiantes = document.querySelector("#registro_estudiantes");
registro_estudiantes.addEventListener('submit', (event)=>
{
    event.preventDefault();
    var formData = new FormData(registro_estudiantes);
    var request = new XMLHttpRequest();
    var ajaxUrl = base_url +'Home/registrar_usuario';
    request.open("POST", ajaxUrl, true);
    // request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.status == 200 & request.readyState ==4)
        {
            var objData = JSON.parse(this.responseText);
          
            if(objData.status)
            {
                Swal.fire("Registrada",objData.msg,"success");
               
            }else 
            {
                Swal.fire( "Atencion!",objData.msg,"error")
            }
            
        }
          
    }
});
