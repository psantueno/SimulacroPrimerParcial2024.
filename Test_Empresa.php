<?php

// Incluir las clases necesarias
require_once 'Cliente.php';
require_once 'Moto.php';
require_once 'Venta.php';
require_once 'Empresa.php';

// Crear dos instancias de Cliente
$objCliente1 = new Cliente("Juan", "Perez", false, "DNI", "12345678");
$objCliente2 = new Cliente("Maria", "Gomez", false, "DNI", "98765432");

// Crear tres objetos Moto
$obMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$obMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$obMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

// Crear la colección de clientes
$clientes = [$objCliente1, $objCliente2];

// Crear la colección de motos
$motos = [$obMoto1, $obMoto2, $obMoto3];

// Coleccioon codigo de motos
$colCodigosMotos1 = [11, 12, 13];

// Crear la colección de ventas realizadas (vacía)
$ventas = [];

// Crear el objeto Empresa con la información proporcionada
$empresa = new Empresa("Alta Gama", "Av Argenetina 123", $clientes, $motos, $ventas);

// Mostrar información de los clientes
echo "Información del Cliente 1:\n";
echo $objCliente1 . "\n";

echo "Información del Cliente 2:\n";
echo $objCliente2 . "\n";

// Mostrar información de las motos
echo "Información de la Moto 1:\n";
echo $obMoto1 . "\n";

echo "Información de la Moto 2:\n";
echo $obMoto2 . "\n";

echo "Información de la Moto 3:\n";
echo $obMoto3 . "\n";


// Mostrar la información de la empresa
echo "Información de la Empresa:\n";
echo $empresa;


// PUNTO 5
$resultado1= $empresa->registrarVenta($colCodigosMotos1, $objCliente2);
echo "Registrar venta:\n";
echo $resultado1 . "\n";

// PUNTO 6
$colCodigosMotos2 = [0];
$resultado2 = $empresa->registrarVenta($colCodigosMotos2, $objCliente2);

echo "Resultado de la venta:\n";
echo "Importe final de la venta: $" . $resultado2 . "\n";

// PUNTO 7

$colCodigosMotos3 = [2];
$resultadoVenta = $empresa->registrarVenta($colCodigosMotos3, $objCliente2);


echo "Resultado de la venta:\n";
echo "Importe final de la venta: $" . $resultadoVenta . "\n";

echo "*********************************************\n";

// Invocar al método retornarVentasXCliente() con los parámetros especificados
$tipoDocCliente1 = $objCliente1->getTipoDocumento();
$numDocCliente1 = $objCliente1->getNumDocumento();
$ventasCliente1 = $empresa->retornarVentasXCliente($tipoDocCliente1, $numDocCliente1);

// Mostrar el resultado obtenido
echo "Ventas del Cliente 1:\n";
if (!empty($ventasCliente1)) {
    foreach ($ventasCliente1 as $venta) {
        echo $venta . "\n";
    }
} else {
    echo "No se encontraron ventas para el Cliente 1.\n";
}


// Invocar al método retornarVentasXCliente() con los parámetros correspondientes al cliente 2
$tipoDocCliente2 = $objCliente2->getTipoDocumento();
$numDocCliente2 = $objCliente2->getNumDocumento();
$ventasCliente2 = $empresa->retornarVentasXCliente($tipoDocCliente2, $numDocCliente2);

// Mostrar el resultado obtenido
echo "Ventas del Cliente 2:\n";
if (!empty($ventasCliente2)) {
    foreach ($ventasCliente2 as $venta) {
        echo $venta . "\n";
    }
} else {
    echo "No se encontraron ventas para el Cliente 2.\n";
}

echo "*********************************************\n";



// Mostrar la información actualizada de la empresa
echo "\nInformación de la Empresa después de la venta:\n";
echo $empresa;

?>
