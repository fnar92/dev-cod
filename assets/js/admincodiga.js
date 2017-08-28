function faseprocesando(code) {

    var id = $('#' + code).val();

    if (id === "procesando") {

        var r = confirm("Estas Seguro De Ejecutar Esta Funcion de Cambio?");
        if (r == true) {

            var procesando = 'procesando';

            $.ajax({
                type: 'POST',
                data: {cambiomedio: procesando, codeid: code},
                url: 'AdminCodiga/Cambiomedia',
                success: function () {
                    alert("Cambio de Ticket Exitoso");
                },
                error: function () {
                    console.log("Error ");
                    alert("Error Cambio de Ticket !Try Agaid!");
                }
            });

        } else {

            $('#' + code).val("inicio");

        }

    }

}

function fasefinalizado(code) {

    var id = $('#' + code + 'dos').val();

    if (id === "finalizado") {

        var r = confirm("Estas Seguro De Ejecutar Esta Funcion de Cambio?");
        if (r == true) {

            var finalizado = 'finalizado';

            var dateObj = new Date();
            var d = new Date();
            var month = d.getMonth() + 1;
            var day = d.getDate();
            var year = dateObj.getUTCFullYear();

            var h = d.getHours();
            var m = d.getMinutes();
            var s = d.getSeconds();

            var today = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day + ' ' + h + ":" + m + ":" + s;

            $.ajax({
                type: 'POST',
                data: {cambiofinal: finalizado, codeid: code, todayend: today},
                url: 'AdminCodiga/Cambiofinalizado',
                success: function () {
                    alert("Cambio de Ticket Finalizado Exitosamente");
                },
                error: function () {
                    console.log("Error ");
                    alert("Error Cambio de Ticket !Try Agaid!");
                }
            });

        } else {

            $('#' + code + 'dos').val("procesando");

        }

    }
}

function addsoporteuser() {

    var soportenewemail = $('#SoporteEmail').val();
    var soportenewpws = $('#SoportePws').val();

    if ((soportenewemail === "") || (soportenewpws === "")) {

        alert("Email y Contraseña Obligatorios");

    } else {

        var soportenewemail = $('#SoporteEmail').val();
        var soportenewpws = $('#SoportePws').val();

        $.ajax({
            type: 'POST',
            data: {emailSP: soportenewemail, pwsSP: soportenewpws},
            url: 'AdminCodiga/IngresarSoporte',
            success: function () {
                alert("Ingreso de nuevo Usuario de Soporte Correctamente");

                $('#SoporteEmail').val("");
                $('#SoportePws').val("");

            },
            error: function () {
                console.log("Error ");
                alert("Error en el nuevo Usuario de Soporte !Try Agaid!");
            }
        });

    }

}


function DesactivarCuenta(code) {

    var id = $('#' + code).val();

    if (id === "Desactivada") {

        var r = confirm("Estas Seguro De Ejecutar Esta Funcion de Cambio?");
        if (r == true) {

            $.ajax({
                type: 'POST',
                data: {codeid: code},
                url: 'AdminCodiga/DesactivarUser',
                success: function () {
                    alert("Usuario Desactivado Correctamente");
                },
                error: function () {
                    console.log("Error ");
                    alert("Error en la Desactivacion !Try Agaid!");
                }
            });

        } else {

            $('#' + code).val("Activada");

        }

    }

}

function ActivarCuenta(code) {

    var id = $('#' + code + 'dos').val();

    if (id === "Activada") {

        var r = confirm("Estas Seguro De Ejecutar Esta Funcion de Cambio?");
        if (r == true) {

            $.ajax({
                type: 'POST',
                data: {codeid: code},
                url: 'AdminCodiga/ActivarUser',
                success: function () {
                    alert("Usuario Activado Correctamente");
                },
                error: function () {
                    console.log("Error ");
                    alert("Error en la Activacion !Try Agaid!");
                }
            });

        } else {

            $('#' + code + 'dos').val("Desactivada");

        }

    }

}

function BajaUserSoporte(code) {


    var id = $('#' + code).val();

    if (id === "Activada") {

    }

    if (id === "Desactivada") {

        var r = confirm("Estas Seguro De Ejecutar Esta Funcion de Cambio?");
        if (r == true) {

            $.ajax({
                type: 'POST',
                data: {codeid: code},
                url: 'AdminCodiga/BajaUS',
                success: function () {
                    alert("Usuario de Soporte Eliminado Correctamente");
                },
                error: function () {
                    console.log("Error ");
                    alert("Error en la Eliminacion del Usuario de Soporte !Try Agaid!");
                }
            });

        } else {

            $('#' + code).val("Activada");

        }

    }

}
