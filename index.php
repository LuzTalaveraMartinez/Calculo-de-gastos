<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gastos de viaje</title>
</head>

<body>

    <form action="#">

        <h1>Hotel Mediterraneo</h1>

        <h2>Calculo de gastos</h2>

        <h4>Habitación por noche $1000</h4>


        <label for="noches">Cantidad de noches: </label>
        <input type="text" name="noches" id="noches" required><br><br>


        <h4>Valor del pasaje según el destino</h4>
        <ul>
            <li>San Bernardo $1200</li>
            <li>Mar del Plata $1500</li>
            <li>San Clemente del tuyu $1300</li>
            <li>Mar de Ajo $1000</li>
        </ul>

        <label for="ciudad">Ciudad</label>

        <select name="ciudad" id="ciudad" required>

            <option value="San Bernardo">San Bernardo</option>
            <option value="Mar del Plata">Mar del Plata</option>
            <option value="San Clemente del Tuyu">San Clemente del Tuyu</option>
            <option value="Mar de Ajo">Mar de Ajo</option>

        </select><br><br>

        <h4>Valor de alquiler de auto</h4>
        <ul>
            <li>Alquiler de auto por día $4000</li>
        </ul><br>
        <p>Si te quedás más de 7 noches el descuento en el alquiler del auto es de $1200 sobre el total</p>
        <p>Si te quedás más de 3 noches el descuento en el alquiler del auto es de $500 sobre el total</p>
        <br><br>
        <input type="submit" name="enviar"><br><br>


    </form>
</body>

</html>

<?php



//LLAMADO DE FUNCIÓN



if (isset($_REQUEST['enviar'])) {
    $noches = $_REQUEST['noches'];
    $ciudad = $_REQUEST['ciudad'];
    $ch = coste_hotel($noches);
    $ca = coste_avion($ciudad);
    $cau = coste_alquiler_auto($noches);
    $resultado = $ch + $ca + $cau;
    echo "El costó total es de $" . $resultado . " incluye (hotel, pasaje y alquiler de auto)";
}





//FUNCIONES




//Costo de hotel



function coste_hotel($n)
{
    $coste_hotel = $n * 1000;
    return $coste_hotel;
}




//Costo de avión



function coste_avion($c)
{

    $coste_viaje = 0;

    if ($c == "San Bernardo") {
        $coste_viaje = 1200;
    } else if ($c == "Mar del Plata") {
        $coste_viaje = 1500;
    } else if ($c == "San Clemente del Tuyu") {
        $coste_viaje = 1300;
    } else if ($c == "Mar de Ajo") {
        $coste_viaje = 1000;
    } else {
        $coste_viaje = 420;
    }
    return $coste_viaje;
}




//Costó de alquiler de auto



function coste_alquiler_auto($n)
{
    $coste = 0;
    $coste = $n * 4000;
    if ($n > 7) {
        $coste = $coste - 1200; // Si se queda más de 7 días se le aplica un descuento de $1200
    } else if ($n > 3) {
        $coste = $coste - 500; // Si se queda más de 3 días se le aplica un descuento de $500
    }
    return $coste;
}



?>