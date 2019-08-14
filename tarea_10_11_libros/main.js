$(document).ready(function () {

    $("#Tabla").load("ConsultarLibros.php");

    function validacion() {
        var titulo, autor, editorial, precio;

        titulo = document.getElementById('titulo').value;
        autor = document.getElementById('autor').value;
        editorial = document.getElementById('editorial').value;
        precio = document.getElementById('precio').value;

        if (titulo == "") {
            alert("Por favor digite el titulo");
            return false;
        }
        else if (autor == "") {
            alert("Por favor digite el autor");
            return false;
        }
        else if (editorial == "") {
            alert("Por favor digite la editorial");
            return false;
        }
        else if (precio == "") {
            alert("Por favor digite el precio");
            return false;
        }

    }
    function validacionA() {
        var titulo, autor,  editorial, precio, identificador;

        identificador = document.getElementById('identificador').value;
        titulo = document.getElementById('tituloA').value;
        autor = document.getElementById('autorA').value;
        editorial = document.getElementById('editorialA').value;
        precio = document.getElementById('precioA').value;

        if (titulo == "") {
            alert("Por favor digite el titulo");
            return false;
        }
        else if (autor == "") {
            alert("Por favor digite el autor");
            return false;
        }
        else if (editorial == "") {
            alert("Por favor digite la editorial");
            return false;
        }
        else if (precio == "") {
            alert("Por favor digite el precio");
            return false;
        }
        else if (identificador == "") {
            alert("Por favor digite el identificador del libro");
            return false;
        }

    }

    function validacionE() {
        var identificadorE;
        identificadorE = document.getElementById('identificadorE').value;

        if (identificadorE == "") {
            alert("Por favor digite el codigo del libro");
            return false;
        }

    }

    $('#Agregar').on("click", function (e) {
        e.preventDefault();

        if (validacion() != false) {
            var titulo, autor, editorial, precio;

            titulo = document.getElementById('titulo').value;
            autor = document.getElementById('autor').value;
            editorial = document.getElementById('editorial').value;
            precio = document.getElementById('precio').value;

            $("#Tabla").load("AgregarLibros.php", { titulo: titulo, autor: autor, editorial: editorial, precio: precio }, function () {
                $("#Tabla").load("ConsultarLibros.php");

                alert("Datos insertados");
            });
        }
    });

    $('#Actualizar').on("click", function (e) {
        e.preventDefault();
        if (validacionA() != false) {
            var titulo, autor, editorial, precio, identificador;

            identificador = document.getElementById('identificador').value;
            titulo = document.getElementById('tituloA').value;
            autor = document.getElementById('autorA').value;
            editorial = document.getElementById('editorialA').value;
            precio = document.getElementById('precioA').value;

            $("#Tabla").load("ActualizarLibros.php", { titulo: titulo, autor: autor, editorial: editorial, precio: precio, identificador: identificador }, function () {
                $("#Tabla").load("ConsultarLibros.php");

                alert("Datos actualizados");
            });
        }
    });

    $('#Eliminar').on("click", function (e) {
        e.preventDefault();
        if (validacionE() != false) {

            var identificadorE;
            identificadorE = document.getElementById('identificadorE').value;

            $("#hidden").load("EliminarLibros.php", { identificadorE: identificadorE }, function () {
                $("#Tabla").load("ConsultarLibros.php");

                alert("Datos Eliminados");
            });
        }
        
    });


    $('#Aumentar10').on("click", function (e) {
        e.preventDefault();

        var editorial;

        editorial = document.getElementById('editorialSP').value;

        $("#hidden").load("AumentarPrecio1.php", { editorial: editorial }, function () {
            $("#Tabla").load("ConsultarLibros.php");

            alert("El precio de la editorial aumento 10%");
        });

    });

    $('#AumentarPorcentaje').on("click", function (e) {
        e.preventDefault();

        var editorial;
        var porcentaje;

        editorial = document.getElementById('editorialSP2').value;
        porcentaje = document.getElementById('porcentaje').value;

        $("#hidden").load("AumentarPrecio2.php", { editorial: editorial, porcentaje: porcentaje }, function () {
            $("#Tabla").load("ConsultarLibros.php");
            alert("El precio de la editorial aumento");
        });
    });

});