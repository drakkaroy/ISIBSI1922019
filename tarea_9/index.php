<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

    <label>Nombre</label>
    <br>
    <input class="w3-container" type = "text" name = "Nombre" id= "Nombre" readonly="readonly"/>
    <br>
    <label>Primer apellido</label>
    <br>
    <input class="w3-container" type = "text" name = "PApellido" id= "PApellido" readonly="readonly"/>
    <br>
    <label>Segundo apellido</label>
    <br>
    <input class="w3-container" type = "text" name = "SApellido" id= "SApellido" readonly="readonly"/>
    <br>
    <label>Cedula</label>
    <br>
    <input class="w3-container" type = "number" name = "Cedula" id= "Cedula" onchange="CargarPersona(this.value)"/>
    <br>
    <label>Telefono</label>
    <br>
    <input class="w3-container" type = "number" name = "Telefono" id= "Telefono"/>
    <br>

    <label>Provincia</label>
    <br>

    <select name="Provincia" id="Provincia"></select>
    <br>
    <label>Canton</label>
    <br>
    <select name="Canton" id="Canton"></select>
    <br>
    <label>Distrito</label>
    <br>
    <select name="Distrito" id="Distrito"></select>
    <br>
    <label>Direccion</label>
    <br>
    <input class="w3-container" type = "text" name = "Direccion" id= "Direccion"/>
    <br>
    <button class="w3-button w3-white w3-border"  name="Agregar" id="Agregar">
        Agregar
    </button>
    <input type = "hidden" name = "hidden" id= "hidden"/>

    <script src="../share/js/jquery-3.4.1.min.js"></script>
    <script src="main.js"></script>
</body>
</html>