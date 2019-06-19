$(document).ready(function(){    

    $element = $('.calculadora');
    $btn = $element.find('#calcular');

    $value1 = $element.find('#value01');
    $value2 = $element.find('#value02');
    

    $btn.click(function(){
        
        $op = $('input[name=operacion]:checked').val();

        $.ajax({
            type: "POST",
            url: "php_ejercicio_11_server.php", 
            data: {op: $op, value1: $value1.val(), value2: $value2.val()},
            success: function(result){
                $("#resultado").html(result);
            },
            error: function ( request, status, error) {
                console.log(request.responseText);
            }
        });

    });
});