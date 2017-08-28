jQuery.validator.addMethod("lettersonly", function (value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Solo Letras.");
$(document).ready(function () {
//validation rules
    $("#infself").validate({
        rules: {
            "nombre": {
                required: true,
                lettersonly: true
            },
            "apelldiop": {
                required: true,
                lettersonly: true
            },
            "apelldiom": {
                required: true,
                lettersonly: true
            },
            "tel": {
                required: true,
                number: true,
                maxlength: 10
            },
            "cel": {
                required: true,
                number: true,
                maxlength: 10
            },
            "dir": {
                required: true
            },
            "colonia": {
                required: true
            },
            "municipio": {
                required: true
            },
            "estado": {
                required: true
            }
        },
        //perform an AJAX post to ajax.php
        submitHandler: function () {
            $.post('EditInf',
                    $('#infself').serialize(),
                    function (data) {
                        alert("Informacion Correctamente Guardada");
                        $('#infself')[0].reset();

                        window.location.href='../Mapa';

                    });
        }
    });
    
    
    $("#CheckPassword").validate({
           rules: {
               NewPwd: { 
                 required: true,
                    minlength: 6,
                    maxlength: 10

               } , 

                   RepPwd: { 
                    equalTo: "#NewPwd",
                     minlength: 6,
                     maxlength: 10
               }
           }
       });
    
    
});

