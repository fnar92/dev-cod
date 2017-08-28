$(document).ready(function () {

    $("#sell").click(function () {

        var datos = $("#seller").serialize();

        $.ajax({
            url: 'ControllersTrazabilidad/Trazabilidad/AddVendedor',
            type: 'POST',
            data: datos,
            beforeSend: function () {
                console.log('Enviando...');
            },
            success: function () {
                console.log('Respondio...');
                alert("Vendedor Correctamente");
                $('#myModal').modal('hide');
                $("#textarea").append("El Numero de Factura es: " + datos[3] + ", ");

                $("#NombrePadre").val("Empty");
                $("#NombrePadre").attr('disabled', true);
                $("#CodigoPurezaPadre").val(0);
                $("#CodigoPurezaPadre").attr('disabled', true);
                $("#RazasPadre").val("Empty");
                $("#RazasPadre").attr('disabled', true);


                $("#NombreMadre").val("Empty");
                $("#NombreMadre").attr('disabled', true);
                $("#CodigoPurezaMadre").val(0);
                $("#CodigoPurezaMadre").attr('disabled', true);
                $("#RazasMadre").val("Empty");
                $("#RazasMadre").attr('disabled', true);

                $("#NombrePadre").hide();
                $("#CodigoPurezaPadre").hide();
                $("#RazasPadre").hide();
                $("#NombreMadre").hide();
                $("#CodigoPurezaMadre").hide();
                $("#RazasMadre").hide();

                $("#Label0").hide();
                $("#Label1").hide();
                $("#Label2").hide();
                $("#Label3").hide();
                $("#Label4").hide();
                $("#Label5").hide();
                $("#Label6").hide();

                $("#style").attr('class', 'btn btn-info btn-lg');

                $('#box').prop('checked', true);
            },
            error: function () {
                console.log("Error ");
                alert("Error al subir Vendedor !Try Agaid!");
                $('#myModal').modal('hide');
            }
        });

    });

});

function mycheckreproduccion(code) {
    var toro = $('#Codigo').val();
    var fecha = $('#FechaSecado').val();

    if ((toro === "") || (fecha === "") || !($('input[name="concesion"]').is(':checked'))) {
        alert("Campos de Codigo del Toro, Concesión y Fecha de Secado Obligatorios ");

        $('input[name="' + code + '"]').attr('checked', false);

    } else {
        if ($('input[name="' + code + '"]').is(':checked')) {

            var datos = $("#fase1").serialize() + "&vaca=" + code;

            $.ajax({
                type: 'POST',
                data: datos,
                url: 'ControllersTrazabilidad/Trazabilidad/controlreproduccion',
                success: function (result) {
                    alert(result);
                    document.getElementById("" + code + "").innerHTML = '<div class="alert alert-success"><strong>Guardado/Save</strong> Vaca Agregada. </div>';
                },
                error: function () {
                    console.log("Error ");
                    alert("Error al subir Vendedor !Try Agaid!");
                }
            });

        } else {

            var datos = $("#fase1").serialize() + "&vaca=" + code;

            $.ajax({
                type: 'POST',
                data: datos,
                url: 'ControllersTrazabilidad/Trazabilidad/deletereproduccion',
                success: function (result) {
                    alert(result);
                    document.getElementById("" + code + "").innerHTML = '';
                },
                error: function () {
                    console.log("Error ");
                    alert("Error al subir Vendedor !Try Agaid!");
                }
            });

        }

    }

}

function mycheck(code) {

    var vacuna = $('#Vacuna').val();
    var fechaprox = $('#theDate').val();
    var costo = $('#Costo').val();
    var observaciones = $('#observacion').val();

    if ((vacuna === '') || (fechaprox === '') || (costo === '') || (observaciones === '')) {

        alert("Campos de Nombre de la vacuna, de Fecha proxima, Costo y Observaciones Obligatorios");

        $('input[name="' + code + '"]').attr('checked', false);

    } else {

        if ($('input[name="' + code + '"]').is(':checked')) {
            var dateObj = new Date();
            var d = new Date();
            var month = d.getMonth() + 1;
            var day = d.getDate();
            var year = dateObj.getUTCFullYear();

            var today = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;

            var nuevovacuna = $('#Vacuna').val();
            var nuevofechaprox = $('#theDate').val();
            var nuevocosto = $('#Costo').val();
            var nuevoobservaciones = $('#observacion').val();

            $.ajax({
                type: 'POST',
                data: {vacuna: nuevovacuna, fecha: today, observacion: nuevoobservaciones, fecha_prox: nuevofechaprox, costo: nuevocosto, idcode: code},
                url: 'ControllersTrazabilidad/Trazabilidad/controlvacunas',
                success: function (result) {
                    alert(result);
                    document.getElementById("" + code + "").innerHTML = '<div class="alert alert-success"><strong>Guardado/Save</strong> Vaca Agregada. </div>';
                },
                error: function () {
                    console.log("Error ");
                    alert("Error al subir Vendedor !Try Agaid!");
                }
            });


        } else {

            var dateObj = new Date();
            var d = new Date();
            var month = d.getMonth() + 1;
            var day = d.getDate();
            var year = dateObj.getUTCFullYear();

            var today = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;

            var nuevofechaprox = $('#theDate').val();
            var nuevocosto = $('#Costo').val();
            var nuevoobservaciones = $('#observacion').val();

            $.ajax({
                type: 'POST',
                data: {fecha: today, observacion: nuevoobservaciones, fecha_prox: nuevofechaprox, costo: nuevocosto, idcode: code},
                url: 'ControllersTrazabilidad/Trazabilidad/deletevacuna',
                success: function (result) {
                    alert(result);
                    document.getElementById("" + code + "").innerHTML = '';
                },
                error: function () {
                    console.log("Error ");
                    alert("Error al subir Vendedor !Try Agaid!");
                }
            });

        }

    }

    return false;

}

function mycheckpadres(value) {

    var regex = new RegExp("^[a-zA-Z]+$");

    if (regex.test(value)) {

        var id = $("#id").val();

        $.ajax({
            type: 'POST',
            data: {key: value, id: id},
            url: 'ControllersTrazabilidad/Trazabilidad/searchpadres',
            success: function (result) {
                var element = result.split(' ');
                var idvaca = element[0];
                var idraza = element[1];

                if (idraza === 'style="border:1px' || value === "") {
                    $("#CodigoPurezaPadre").attr("placeholder", "Valor Incorrecto ,Selecciona la Raza del Animal");
                    $("#RazasPadre").attr("placeholder", "Valor Incorrecto , Selecciona la Raza del Animal");
                } else {
                    $("#CodigoPurezaPadre").val(idvaca);
                    $("#RazasPadre").val(idraza);
                }
            },
            error: function () {
                console.log("Error");
                alert("Error al subir Vendedor !Try Agaid!");
            }
        });
        return false;

    }
    
     if($('#NombrePadre').val() == ""){
        $("#CodigoPurezaPadre").val("");
        $("#RazasPadre").val("");
    }
    
}

function mycheckmadres(value) {

    var regex = new RegExp("^[a-zA-Z]+$");

    if (regex.test(value)) {

        var id = $("#id").val();

        $.ajax({
            type: 'POST',
            data: {key: value, id: id},
            url: 'ControllersTrazabilidad/Trazabilidad/searchpadres',
            success: function (result) {
                var element = result.split(' ');
                var idvaca = element[0];
                var idraza = element[1];

                if (idraza === 'style="border:1px' || value === "") {
                    $("#RazasMadre").attr("placeholder", "Valor Incorrecto ,Selecciona la Raza del Animal");
                    $("#CodigoPurezaMadre").attr("placeholder", "Valor Incorrecto ,Selecciona la Raza del Animal");
                } else {
                    $("#CodigoPurezaMadre").val(idvaca);
                    $("#RazasMadre").val(idraza);
                }

            },
            error: function () {
                console.log("Error");
                alert("Error al subir Vendedor !Try Agaid!");
            }
        });
        return false;

    }
    
    if($('#NombreMadre').val() == ""){
        $("#CodigoPurezaMadre").val("");
        $("#RazasMadre").val("");
    }
    
}


$(document).ready(function () {

    $("#buy").click(function () {

        var datos = $("#comprador").serialize();

        $.ajax({
            url: 'ControllersTrazabilidad/Trazabilidad/Addcomprador',
            type: 'POST',
            data: datos,
            beforeSend: function () {
                console.log('Enviando...');
            },
            success: function () {
                console.log('Respondio...');
                alert("Comprador Correctamente");
                $("#costobuy").val($("#costo").val());
                $('#myModalBaja').modal('hide');
                $('#vendido').prop('checked', true);
            },
            error: function () {
                console.log("Error ");
                alert("Error al subir Vendedor !Try Agaid!");
                $('#myModalBaja').modal('hide');
            }
        });

    });

});


$(document).ready(function () {

    $("#bajaclick").click(function () {

        var dateObj = new Date();
        var d = new Date();
        var month = d.getMonth() + 1;
        var day = d.getDate();
        var year = dateObj.getUTCFullYear();

        var today = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;

        var datos = $("#bajacabeza").serialize() + "&fecha=" + today;

        $.ajax({
            url: 'ControllersTrazabilidad/Trazabilidad/deletecabeza',
            type: 'POST',
            data: datos,
            beforeSend: function () {
                console.log('Enviando...');
            },
            success: function () {
                console.log('Respondio...');
                alert("Baja De Cabeza Correctamente");

                $("#costobuy").val(0);
                $("#codecows").val("");
                $('#vendido').prop('checked', false);
                $('#muerto').prop('checked', false);
                $("#comentario").val("");

                $("#codecows").attr("placeholder", "Introduzca Codigo del Animal");
                $("#comentario").attr("placeholder", "Descripcion del Problema con tu propia descripcion");

            },
            error: function () {
                console.log("Error ");
                alert("Error !Try Agaid!, Tal ves no exsiste ese Animal");
            }
        });

    });

});

function mychecktodos(todos) {

    var vacuna = $('#Vacuna').val();
    var fechaprox = $('#FechaProx').val();
    var costo = $('#Costo').val();
    var observaciones = $('#observacion').val();

    if ((vacuna === '') || (fechaprox === '') || (costo === '') || (observaciones === '')) {

        alert("Campos de Nombre de la vacuna, de Fecha proxima, Costo y Observaciones Obligatorios");

        $('input[name="todos"]').attr('checked', false);

    } else {

        if ($('input[id="todos"]').is(':checked')) {

            var r = confirm("Estas Seguro De Ejecutar Esta Funcion?");
            if (r == true) {


                $(".cows").prop('checked', true);

                var dateObj = new Date();
                var d = new Date();
                var month = d.getMonth() + 1;
                var day = d.getDate();
                var year = dateObj.getUTCFullYear();

                var today = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;

                var nuevovacuna = $('#Vacuna').val();
                var nuevofechaprox = $('#FechaProx').val();
                var nuevocosto = $('#Costo').val();
                var nuevoobservaciones = $('#observacion').val();

                $.ajax({
                    type: 'POST',
                    data: {vacuna: nuevovacuna, fecha: today, observacion: nuevoobservaciones, fecha_prox: nuevofechaprox, costo: nuevocosto, idcode: todos},
                    url: 'ControllersTrazabilidad/Trazabilidad/controlvacunasall',
                    success: function (result) {
                        var element = result.split(' ');
                        var nota = element.pop();

                        if (nota != "") {
                            alert("Todos Seleccionado Corectamente");
                        } else {
                            alert("Error en No hay Animales");
                            $("#todos").prop('checked', false);
                        }
                    },
                    error: function () {
                        console.log("Error ");
                        alert("Error al subir Vendedor !Try Agaid!");
                    }
                });


            } else {

            }

        }
        else {

            var r = confirm("Estas Seguro De Ejecutar Esta Funcion?");
            if (r == true) {

                $(".cows").prop('checked', false);

                var dateObj = new Date();
                var d = new Date();
                var month = d.getMonth() + 1;
                var day = d.getDate();
                var year = dateObj.getUTCFullYear();

                var today = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;

                var nuevovacuna = $('#Vacuna').val();
                var nuevofechaprox = $('#FechaProx').val();
                var nuevocosto = $('#Costo').val();
                var nuevoobservaciones = $('#observacion').val();

                $.ajax({
                    type: 'POST',
                    data: {vacuna: nuevovacuna, fecha: today, observacion: nuevoobservaciones, fecha_prox: nuevofechaprox, costo: nuevocosto, idcode: todos},
                    url: 'ControllersTrazabilidad/Trazabilidad/controlvacunasalldelete',
                    success: function () {
                        alert("Todos Deseleccionado Corectamente");
                        $(".cows").prop('checked', false);
                    },
                    error: function () {
                        console.log("Error ");
                        alert("Error al subir Vendedor !Try Agaid!");
                    }
                });

            } else {

            }

        }

    }


}

function mychecktodosreproduccion(todos) {

    var toro = $('#Codigo').val();
    var fecha = $('#FechaSecado').val();

    if ((toro === "") || (fecha === "") || !($('input[name="concesion"]').is(':checked'))) {
        alert("Campos de Codigo del Toro, Concesión y Fecha de Secado Obligatorios ");

        $('input[name="todos"]').attr('checked', false);

    } else {

        if ($('input[id="todos"]').is(':checked')) {

            var r = confirm("Estas Seguro De Ejecutar Esta Funcion?");
            if (r == true) {

                $(".cows").prop('checked', true);

                var datos = $("#fase1").serialize() + "&idcode=" + todos;

                $.ajax({
                    type: 'POST',
                    data: datos,
                    url: 'ControllersTrazabilidad/Trazabilidad/controlreproduccionall',
                    success: function (result) {
                        var element = result.split(' ');
                        var nota = element.pop();

                        if (nota != "") {
                            alert("Todos Seleccionado Corectamente");
                        } else {
                            alert("Error en No hay Animales");
                            $("#todos").prop('checked', false);
                        }
                    },
                    error: function () {
                        console.log("Error ");
                        alert("Error al subir Vendedor !Try Agaid!");
                    }
                });

            } else {

            }
        } else {

            var r = confirm("Estas Seguro De Ejecutar Esta Funcion?");
            if (r == true) {
                var datosnew = $("#fase1").serialize() + "&idcode=" + todos;

                $.ajax({
                    type: 'POST',
                    data: datosnew,
                    url: 'ControllersTrazabilidad/Trazabilidad/controlreproduccionalldelete',
                    success: function () {
                        alert("Todos Deseleccionado Corectamente");
                        $(".cows").prop('checked', false);
                    },
                    error: function () {
                        console.log("Error ");
                        alert("Error al subir Vendedor !Try Agaid!");
                    }
                });

            } else {

            }

        }

    }
}

function mychecktodosproduccion(todos) {

    var litros = $('#Litros').val();
    var vendido = $('#Vendido').val();
    var costo = $('#Costo').val();

    if ((litros === '') || (vendido === '') || (costo === '')) {

        alert("Campos de Litros, Vendedor y Costo Obligatorios");

        $('input[name="todos"]').attr('checked', false);

    } else {

        if ($('input[id="todos"]').is(':checked')) {

            var r = confirm("Estas Seguro De Ejecutar Esta Funcion?");
            if (r == true) {

                $(".cows").prop('checked', true);

                var newlitros = $('#Litros').val();
                var newvendido = $('#Vendido').val();
                var newcosto = $('#Costo').val();

                $.ajax({
                    type: 'POST',
                    data: {litros: newlitros, vendedo: newvendido, costo: newcosto, idcode: todos},
                    url: 'ControllersTrazabilidad/Trazabilidad/controlproduccionall',
                    success: function (result) {
                        var element = result.split(' ');
                        var nota = element.pop();

                        if (nota != "") {
                            alert("Todos Seleccionado Corectamente");
                        } else {
                            alert("Error en No hay Animales");
                            $("#todos").prop('checked', false);
                        }
                    },
                    error: function () {
                        console.log("Error ");
                        alert("Error al subir Vendedor !Try Agaid!");
                    }
                });

            } else {

            }

        } else {

            var r = confirm("Estas Seguro De Ejecutar Esta Funcion?");
            if (r == true) {

                $(".cows").prop('checked', false);

                var newlitros = $('#Litros').val();
                var newvendido = $('#Vendido').val();
                var newcosto = $('#Costo').val();

                $.ajax({
                    type: 'POST',
                    data: {litros: newlitros, vendedo: newvendido, costo: newcosto, idcode: todos},
                    url: 'ControllersTrazabilidad/Trazabilidad/controlproduccionalldelete',
                    success: function () {
                        alert("Todos Deseleccionado Corectamente");
                        $(".cows").prop('checked', false);
                    },
                    error: function () {
                        console.log("Error ");
                        alert("Error al subir Vendedor !Try Agaid!");
                    }
                });

            } else {

            }

        }

    }

}

function mycheckname(value) {

    var id = $("#id").val();

    $.ajax({
        type: 'POST',
        data: {key: value, id: id},
        url: 'ControllersTrazabilidad/Trazabilidad/searchname',
        success: function (result) {

            if (result === "Continual") {
                return false;
            } else {
                alert("Este Nombre Ya Exsiste");
            }
        },
        error: function () {
            console.log("Error");
            alert("Error al subir Vendedor !Try Agaid!");
        }
    });
    return false;

}

function fase1Inicio() {

    input = $('input[name="Codigo"]').val();

    if (input == "") {
        $("#fase2inicio").show();
    }

    if (input != "") {
        $("#fase2inicio").hide()();
    }
}

function fase2inicio() {

    input = $('select[name="idface2"]').val();


    if (input == "") {
        $("#fase2").hide();
        $("#fase1").show();
        $("#ocultartodo").show();
        $("#the-content").show();
    }

    if (input != "") {
        $("#fase2").show();
        $("#fase1").hide();
        $("#ocultartodo").hide();
        $("#the-content").hide();
        var elementos = input.split(" ");

        var toro = elementos[0];
        var fecha = elementos[1];
        var concesion = elementos[2];


        $.ajax({
            url: 'ControllersTrazabilidad/Trazabilidad/fasespendientesvacas',
            type: 'POST',
            data: {toro: toro, fecha: fecha, concesion: concesion},
            success: function (result) {
                document.getElementById("fase1vacas").innerHTML = result;
            },
            error: function () {
                console.log("Error ");
                alert("Error al subir Vendedor !Try Agaid!");
            }
        });


    }

}

$(document).ready(function () {
    $("#finalizafase2").click(function () {

        select = $('select[name="idface2"]').val();

        var elementos = select.split(" ");

        var toro = elementos[0];
        var fecha = elementos[1];
        var concesion = elementos[2];
        var numnac = $("#NumeroNacimientos").val();
        var nummue = $("#NumeroMuertos").val();
        var fechaparto = $("#FechaParto").val();

        if ((numnac === '') || (nummue === '') || (fechaparto === '')) {

            alert("Campos de Numero de Nacimientos, Muertos y Fecha de Parto Obligatorios");

        } else {
            $.ajax({
                url: 'ControllersTrazabilidad/Trazabilidad/insertreproduccion',
                type: 'POST',
                data: {toro: toro, fecha: fecha, concesion: concesion, numnacido: numnac, numeromuerto: nummue, fechaparto: fechaparto},
                success: function () {
                    alert("Reproduccion Finalizada Correctamente");
                    window.location.href = 'AdministracionReproduccion';
                },
                error: function () {
                    console.log("Error ");
                    alert("Error al subir Vendedor !Try Agaid!");
                }
            });

        }
    });
});


function mycheckidcows(value) {

    var id = $("#id").val();

    $.ajax({
        type: 'POST',
        data: {key: value, id: id},
        url: 'ControllersTrazabilidad/Trazabilidad/searchidcows',
        success: function (result) {

            if (result === "Continual") {
                return false;
            } else {
                alert(result);
            }
        },
        error: function () {
            console.log("Error");
            alert("Error al subir Vendedor !Try Agaid!");
        }
    });
    return false;
}

function mycheckproduccion(idcows) {

    var litros = $('#Litros').val();
    var vendido = $('#Vendido').val();
    var costo = $('#Costo').val();

    if ((litros === '') || (vendido === '') || (costo === '')) {

        alert("Campos de Litros, Vendedor y Costo Obrigatorios");

        $('input[name="' + idcows + '"]').attr('checked', false);

    } else {

        if ($('input[name="' + idcows + '"]').is(':checked')) {

            var newlitros = $('#Litros').val();
            var newvendido = $('#Vendido').val();
            var newcosto = $('#Costo').val();

            $.ajax({
                url: 'ControllersTrazabilidad/Trazabilidad/controlproduccion',
                type: 'POST',
                data: {litros: newlitros, vendedo: newvendido, costo: newcosto, idcode: idcows},
                success: function (result) {
                    alert(result);
                    document.getElementById("" + idcows + "").innerHTML = '<div class="alert alert-success"><strong>Guardado/Save</strong> Vaca Agregada. </div>';
                },
                error: function () {
                    console.log("Error ");
                    alert("Error al subir Vendedor !Try Agaid!");
                }
            });

        } else {

            var newlitros = $('#Litros').val();
            var newvendido = $('#Vendido').val();
            var newcosto = $('#Costo').val();

            $.ajax({
                url: 'ControllersTrazabilidad/Trazabilidad/deleteproduccion',
                type: 'POST',
                data: {litros: newlitros, vendedo: newvendido, costo: newcosto, idcode: idcows},
                success: function (result) {
                    alert(result);
                    document.getElementById("" + idcows + "").innerHTML = '';
                },
                error: function () {
                    console.log("Error ");
                    alert("Error al subir Vendedor !Try Agaid!");
                }
            });

        }


    }

}

$(document).ready(function () {

    $("#clickreporte").click(function () {

        var CodigoCows = $("#CodigoCows").val();
        var Evento = $("#Evento").val();

        if ((CodigoCows === '') || (Evento === 'Selecciona Un Tipo de Busqueda')) {

            var mgs = " Campos de Codigo de Vaca y Tipo de Evento Obrigatorios.";
            document.getElementById("the-content").innerHTML = '<br><br><div class="alert alert-danger"><strong>Error!</strong>' + mgs + '</div>';

        } else {

            if (Evento === 'Administracion de Vacunas') {
                
                var datos = $("#reportes").serialize();

                $.ajax({
                    url: 'ControllersTrazabilidad/Trazabilidad/ReporteVacunas',
                    type: 'POST',
                    data: datos,
                    beforeSend: function () {
                        console.log('Enviando...');
                    },
                    success: function (result) {
                        console.log('Respondio...');

                        document.getElementById("the-content").innerHTML = '<br>' + result;
                    },
                    error: function () {
                        console.log("Error ");
                        alert("Error al subir Vendedor !Try Agaid!");
                    }
                });

            } else if (Evento === 'Administracion de Produccion') {
                
                var datos = $("#reportes").serialize();

                $.ajax({
                    url: 'ControllersTrazabilidad/Trazabilidad/ReporteProduccion',
                    type: 'POST',
                    data: datos,
                    beforeSend: function () {
                        console.log('Enviando...');
                    },
                    success: function (result) {
                        console.log('Respondio...');

                        document.getElementById("the-content").innerHTML = '<br>' + result;
                    },
                    error: function () {
                        console.log("Error ");
                        alert("Error al subir Vendedor !Try Agaid!");
                    }
                });

            } else if (Evento === 'Administracion de Reproduccion') {

                var datos = $("#reportes").serialize();

                $.ajax({
                    url: 'ControllersTrazabilidad/Trazabilidad/ReporteReproduccion',
                    type: 'POST',
                    data: datos,
                    beforeSend: function () {
                        console.log('Enviando...');
                    },
                    success: function (result) {
                        console.log('Respondio...');

                        document.getElementById("the-content").innerHTML = '<br>' + result;
                    },
                    error: function () {
                        console.log("Error ");
                        alert("Error al subir Vendedor !Try Agaid!");
                    }
                });
                
            } else {

                var mgs = " Campos de Codigo de Vaca y Tipo de Evento Obrigatorios.";
                document.getElementById("the-content").innerHTML = '<br><br><div class="alert alert-danger"><strong>Error!</strong>' + mgs + '</div>';


            }

        }

    });

});

