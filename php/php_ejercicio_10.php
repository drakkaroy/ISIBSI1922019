<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio #10</title>
    <style>
        form div { margin: 0 0 30px}
    </style>
</head>
<body>

    <form action="php_ejercicio_10_server.php" method="post">

        <div>Ingrese un texto: <input type="text" name="number01"></div>
        
        <div>Texto: <textarea name="number02" cols="50" rows="3"></textarea></div>
        
        <div>
            Selección:
            <select name="number03">
                <option value="valor1">Valor 1</option>
                <option value="valor2">Valor 2</option>
                <option value="valor3">Valor 3</option>
                <option value="valor4">Valor 4</option>
            </select>
        </div>

        <div>
            Desea marcar el checkbox
            <input type="checkbox" name="number04">
        </div>

        <div>
            Seleccione una opcion del radio
            <input type="radio" name="number05" value="radio_01">
            <input type="radio" name="number05" value="radio_02">
            <input type="radio" name="number05" value="radio_03">
        </div>
        
        <div>
            <input type="button" value="Boton de prueba">
        </div>

        <div>
            <input type="range" name="number06" min="0" max="10" value="5">
        </div>

        <div>
            <input type="submit">
        </div>


    </form>
    
</body>
</html>