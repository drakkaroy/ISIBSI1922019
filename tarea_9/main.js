function CargarPersona(cedula) {
    if ((cedula != "") && (/^[0-9]\d{8}$/.test(cedula))) {
        var Nombre = "";
        var PApellido = "";
        var SApellido = "";

        $.getJSON("https://apis.gometa.org/cedulas/" + cedula, function (datos) {

            $.each(datos.results, function (i, resultados) {

                Nombre = resultados.firstname1;
                PApellido = resultados.lastname1;
                SApellido = resultados.lastname2;

            });

            document.getElementById('Nombre').value = Nombre;
            document.getElementById('PApellido').value = PApellido;
            document.getElementById('SApellido').value = SApellido;


        });
    }
    else {
        alert("Problemas al encontrar datos verifique el formato de la cedula");
    }

}

function validacion() {
    var Nombre;
    var PApellido;
    var SApellido;
    var Cedula;
    var Telefono;
    var Provincia;
    var Canton;
    var Distrito;
    var Direccion;

    Nombre = document.getElementById('Nombre').value;
    PApellido = document.getElementById('PApellido').value;
    SApellido = document.getElementById('SApellido').value;
    Cedula = document.getElementById('Cedula').value;
    Telefono = document.getElementById('Telefono').value;
    Provincia = document.getElementById('Provincia').value;
    Canton = document.getElementById('Canton').value;
    Distrito = document.getElementById('Distrito').value;
    Direccion = document.getElementById('Direccion').value;


    if (Cedula == "") {
        alert("Por favor digite la Cedula del Cliente");
        return false;

    }
    else if (!/^[1-9]-?\d{4}-?\d{4}$/.test(Cedula)) {

        alert("La cedula debe tener 9 digitos");
        return false;

    }
    else if (Telefono == "") {
        alert("Por favor digite el Telefono del Cliente");
        return false;

    }
    else if (Provincia == '99') {
        alert("Por favor debe seleccionar una Provincia");
        return false;

    }
    else if (Canton == '99') {
        alert("Por favor debe seleccionar un Canton");
        return false;

    }
    else if (Distrito == '99') {
        alert("Por favor debe seleccionar un Distrito");
        return false;
    }
}
$(document).ready(function () {

    $.ajax({
        dataType: "json",
        url: "https://ubicaciones.paginasweb.cr/provincias.json",
        data: {},
        success: function (data) {


            var html = "<select>";
            html += "<option value='99'>Elija una provincia</option>";
            for (key in data) {
                html += "<option value='" + key + "'>" + data[key] + "</option>";
            }
            html += "</select";
            $('#Provincia').html(html);
        }

    });

    $("#Provincia").click(function (evento) {
        $('#Canton').html("");

        var Provincia = document.getElementById('Provincia').value;
        if (Provincia != '99') {
            $.ajax({
                dataType: "json",
                url: "https://ubicaciones.paginasweb.cr/provincia/" + Provincia + "/cantones.json",
                data: Provincia,
                success: function (data) {
                    var html = "<select>";
                    html += "<option value='99'>Elija un Canton</option>";
                    for (key in data) {
                        html += "<option value='" + key + "'>" + data[key] + "</option>";
                    }
                    html += "</select";
                    $('#Canton').html(html);
                    $('#Distrito').html("");
                }
            });
        }
    });
    $("#Canton").click(function (evento) {

        var Provincia = document.getElementById('Provincia').value;
        var Canton = document.getElementById('Canton').value;
        if (Canton != '99' && Canton != "") {

            $.ajax({
                dataType: "json",
                url: "https://ubicaciones.paginasweb.cr/provincia/" + Provincia + "/canton/" + Canton + "/distritos.json",
                data: Provincia,
                success: function (data) {
                    var html = "<select>";
                    html += "<option value='99'>Elija un Distrito</option>";
                    for (key in data) {
                        html += "<option value='" + key + "'>" + data[key] + "</option>";
                    }
                    html += "</select";
                    $('#Distrito').html(html);
                }
            });
        }
    });


    $('#Agregar').on("click", function (e) {
        e.preventDefault();

        if (validacion() == false) {


        }
        else {
            var Nombre;
            var PApellido;
            var SApellido;
            var Cedula;
            var Telefono;
            var Provincia;
            var Canton;
            var Distrito;
            var Direccion;

            Nombre = document.getElementById('Nombre').value;
            PApellido = document.getElementById('PApellido').value;
            SApellido = document.getElementById('SApellido').value;
            Cedula = document.getElementById('Cedula').value;
            Telefono = document.getElementById('Telefono').value;
            Provincia = document.getElementById('Provincia').value;
            Canton = document.getElementById('Canton').value;
            Distrito = document.getElementById('Distrito').value;
            Direccion = document.getElementById('Direccion').value;



            $("#hidden").load("server.php", { Nombre: Nombre, PApellido: PApellido, SApellido: SApellido, Cedula: Cedula, Telefono: Telefono, Provincia: Provincia, Canton: Canton, Distrito: Distrito, Direccion: Direccion }, function () {
                alert("Datos insertados");
            });
        }

    });

})