$(document).ready(function () {
    $("#fom_Point").validate({
        rules: {
            "latitud": {
                required: true,
                number: true
            },
            "longitud": {
                required: true,
                number: true
            }
        }
    }); 
    $("#insertPoint").click(function () {       
        var validacion = $("#fom_Point").valid();
    });
});
