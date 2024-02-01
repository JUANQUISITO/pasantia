console.log("estamos en funciones seguimiento");

var tableSeguimiento = new DataTable("#Tableseguimiento",{
    "aProcessing":true,
	"aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
      
        ajax:{
            url:  '' + base_url + '/Seguimiento/getSelectSeguimiento',
            dataSrc:'',
        },
        columns:[
            {data: 'cod_seguimiento'},
            {data:'estado_seg'},
            {data:'nro_matricula'},
            {data:'mensaje_seg'},
            {data:'nombre_cargo'},
            {data:'fecha'},
            {data: 'options'}
       
        ],

    scrollY: 400,
    responsive: true,
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[0,"desc"]] 
});