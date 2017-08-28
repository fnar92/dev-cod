$(document).ready(function () {

    $("#insertTickets").click(function () {

        var dateObj = new Date();
        var d = new Date();
        var month = d.getMonth() + 1;
        var day = d.getDate();
        var year = dateObj.getUTCFullYear();

        var h = d.getHours();
        var m = d.getMinutes();
        var s = d.getSeconds();

        var today = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day+' '+h + ":" + m + ":" + s;

        var datos = $("#InsertTicket").serialize() + "&fecha=" + today;


        $.ajax({
            url: 'ControllersTickets/Tickets/AddTickets',
            type: 'POST',
            data: datos,
            beforeSend: function () {
                console.log('Enviando...');
            },
            success: function () {
                console.log('Respondio...');

                $("#Error").val("");
                $("#Error").attr("placeholder", "Selecciona Posible Error");
                

                $("#Descripcion").val("");
                $("#Descripcion").attr("placeholder", "Descripcion del Problema con tu propia descripcion");

                alert("Inf Guardada Corectamente");

            },
            error: function () {
                console.log("Error ");

            }
        });

    });

});