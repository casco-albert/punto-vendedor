
//Jquery para consulta el codigo de producto al servidor

$(document).ready(function(){
    $("#codigo").keydown(function(event){
        if(event.which === 13){
            event.preventDefault();
            var inputValue = $("#codigo").val();
            enviarSolicitud(inputValue);
        }
    });

    function enviarSolicitud(id) {
        $.ajax({
            url: "includes/mostrar_precio.php",
            method: "POST",
            data: { id: id },
            success: function(response){
                $("#precio").html(response);
                $("#punto").html(response);
                console.log("Solicitud completada sin errores");
                console.log(response);
            },
            error: function(xhr, status, error){
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }
});

