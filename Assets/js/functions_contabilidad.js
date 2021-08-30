var tableContabilidad;
var tableEgresos;
var tableIngresos;
document.addEventListener('DOMContentLoaded',function(){

    tableContabilidad = $('#tableContabilidad').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Contabilidad/getContabilidad",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_con_sembrios"},
            {"data":"nombre_contabilidad"},
            {"data":"fecha_inicio"},
            {"data":"p_fecha_final"},
            {"data":"descripcion"},
            {"data":"status"},
            {"data":"options"}
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger"
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    }); 

    tableEgresos = $('#tableEgresos').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Contabilidad/getEgresos",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_egresos"},
            {"data":"producto"},
            {"data":"cantidad"},
            {"data":"precio"},
            {"data":"descripcion"},
            {"data":"options"}
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger"
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });

    tableIngresos = $('#tableIngresos').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Contabilidad/getIngresos",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_ingreso"},
            {"data":"producto"},
            {"data":"cantidad"},
            {"data":"precio"},
            {"data":"descripcion"},
            {"data":"options"}
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger"
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });


    //nueva Contabilidad
    var formContabilidad = document.querySelector("#formContabilidad");
    formContabilidad.onsubmit = function (e) {
    e.preventDefault();

    var intIdContabilidad = document.querySelector('#idContabilidad').value;
    var strContabilidad = document.querySelector('#txtnombreContabilidad').value;
    var strDateinicio = document.querySelector('#datefinicio').value;
    var strDatefinal = document.querySelector('#dateffinal').value;
    var strDescripcion = document.querySelector('#descripcion').value;
    var intStatus = document.querySelector('#liststatus').value;
    if (strContabilidad == '' || strDateinicio == '' || strDatefinal== '' ||strDescripcion==''|| intStatus == '') {
        swal("Atencion", "Todos los campos son obligatorio", "error");
        return false;
    }
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Contabilidad/setContabilidad';
    var formData = new FormData(formContabilidad);
    request.open("POST", ajaxUrl, true);
    request.send(formData);
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                $('#modalFormContabilidad').modal("hide");
                formContabilidad.reset();
                swal("Contabilidad", objData.msg, "success");
                tableRoles.ajax.reload();
            } else {
                swal("Error", objData.msg, "error");
            }
        }
        return false;
    }
    }
    //Egresos
    var formEgresos = document.querySelector("#formEgresos");
    formEgresos.onsubmit = function (e) {
        e.preventDefault();
    
        var intIdEgresos = document.querySelector('#idEgresosEg').value;
        var strProducto = document.querySelector('#txtproductoEg').value;
        var intCantidad = document.querySelector('#intcantidadEg').value;
        var intPrecio = document.querySelector('#intprecioEg').value;
        var strDescripcion = document.querySelector('#descripcionEg').value;
    
        if (strProducto == '' || strDescripcion == '') {
            swal("Atencion", "Todos los campos son obligatorio", "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Contabilidad/setEgresos';
        var formData = new FormData(formEgresos);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    $('#modalFormEgresos').modal("hide");
                    formEgresos.reset();
                    swal("Egresos", objData.msg, "success");
                    tableEgresos.api().ajax.reload();
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
            return false;
        }
    }

    var formIngresos = document.querySelector("#formIngresos");
    formIngresos.onsubmit = function (e) {
        e.preventDefault();
    
        var intIgresos = document.querySelector('#idEgresosEg').value;
        var strProductoingreso = document.querySelector('#txtproductoIg').value;
        var intCantidadingreso = document.querySelector('#intcantidadIg').value;
        var intPrecioingreso = document.querySelector('#intprecioIg').value;
        var strDescripcion = document.querySelector('#descripcionIg').value;
    
        if (strProductoingreso == ''|| intCantidadingreso == '' || intPrecioingreso == '' || strDescripcion == '') {
            swal("Atencion", "Todos los campos son obligatorio", "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Contabilidad/setIngresos';
        var formData = new FormData(formIngresos);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    $('#modalFormIngresos').modal("hide");
                    formIngresos.reset();
                    swal("Ingresos", objData.msg, "success");
                    tableIngresos.api().ajax.reload();
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
            return false;
        }
    }

}, false);

                
    
function fntEgresos(idEgreso){
    var idEgreso = idEgreso;
    document.querySelector('#idEgresosEg').value=idEgreso;
    $('#modalFormEgresos').modal("show");
    
}

function fntIngresos(idIngresos){
    var idIngresos = idIngresos;
    document.querySelector('#idIngresosIg').value=idIngresos;
    $('#modalFormIngresos').modal("show");
}

function fntViewInfo(idcontabilidad){
    var idcontabilidad = idcontabilidad;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Contabilidad/getConta/'+idcontabilidad;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState==4 && request.status == 200){
            var objData = JSON.parse(request.responseText);

            if(objData.status)
            {
                var estado = objData.data.status == 1 ? 
                '<span class="badge badge-success">Activo</span>' : 
                '<span class="badge badge-danger">Inactivo</span>';

                document.querySelector("#celId").innerHTML = objData.data.id_con_sembrios;
                document.querySelector("#celNombre").innerHTML = objData.data.nombre_contabilidad;
                document.querySelector("#celFinicio").innerHTML = objData.data.fecha_inicio;
                document.querySelector("#celFfinal").innerHTML = objData.data.p_fecha_final;
                document.querySelector("#celDescripcion").innerHTML = objData.data.descripcion;
                document.querySelector("#celStatus").innerHTML = estado;
                $('#modalViewContabilidad').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function fntDelInfo(idpersona){

    var id_con_sembrios = idpersona;
    swal({
        title: "Eliminar Contabilidad",
        text: "¿Realmente quiere eliminar la Contabilidad?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Contabilidad/delContabilidad';
            var strData = "id_con_sembrios="+id_con_sembrios;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableContabilidad.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}

function fntViewInfoE(idegreso){
    var idegreso = idegreso;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Contabilidad/getEgreso/'+idegreso;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState==4 && request.status == 200){
            var objData = JSON.parse(request.responseText);

            if(objData.status)
            {

                document.querySelector("#celIdegreso").innerHTML = objData.data.id_egresos;
                document.querySelector("#celNombreEgreso").innerHTML = objData.data.producto;
                document.querySelector("#celCantidad").innerHTML = objData.data.cantidad;
                document.querySelector("#celPrecio").innerHTML = objData.data.precio;
                document.querySelector("#celDescripcionn").innerHTML = objData.data.descripcion;
                $('#modalViewEgreso').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function fntDelInfoE(idegreso){

    var idegreso = idegreso;
    swal({
        title: "Eliminar Contabilidad",
        text: "¿Realmente quiere eliminar la Contabilidad?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Contabilidad/delEgresos';
            var strData = "idegreso="+idegreso;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableEgresos.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}

function fntViewInfoI(idingreso){
    var idingreso = idingreso;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Contabilidad/getIngreso/'+idingreso;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState==4 && request.status == 200){
            var objData = JSON.parse(request.responseText);

            if(objData.status)
            {

                document.querySelector("#celIdingreso").innerHTML = objData.data.id_ingreso;
                document.querySelector("#celNombreIngreso").innerHTML = objData.data.producto;
                document.querySelector("#celCantidadI").innerHTML = objData.data.cantidad;
                document.querySelector("#celPrecioI").innerHTML = objData.data.precio;
                document.querySelector("#celDescripcionnI").innerHTML = objData.data.descripcion;
                $('#modalViewIngreso').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function openModal(){

    document.querySelector('#idContabilidad').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Contabilidad";
    document.querySelector("#formContabilidad").reset();
	$('#modalFormContabilidad').modal('show');
}