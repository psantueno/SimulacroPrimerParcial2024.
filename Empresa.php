<?php

class Empresa {

    private $denominacion;
    private $direccion;
    private $clientes; // colección de clientes
    private $motos;    // colección de motos
    private $ventas;   // colección de ventas



    // Constructor
    public function __construct($denominacion, $direccion, $clientes, $motos, $ventas) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->clientes = $clientes;
        $this->motos = $motos;
        $this->ventas = $ventas;
    }


    // Métodos Get
    public function getDenominacion() {
        return $this->denominacion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getClientes() {
        return $this->clientes;
    }

    public function getMotos() {
        return $this->motos;
    }

    public function getVentas() {
        return $this->ventas;
    }


    // Métodos Set
    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setClientes($clientes) {
        $this->clientes = $clientes;
    }

    public function setMotos($motos) {
        $this->motos = $motos;
    }

    public function setVentas($ventas) {
        $this->ventas = $ventas;
    }


// Retorna la moto segun el codigo ingresado.
    public function retornarMoto($codigoMoto) {
        $motoEncontrada = null;
    
        foreach ($this->motos as $moto) {
            if ($moto->getCodigo() === $codigoMoto) {
                $motoEncontrada = $moto;
            }
        }
    
        return $motoEncontrada;
    }

// Retorna el valor final de una venta
    public function registrarVenta($colCodigosMoto, $objCliente) {
       
        $importeFinal = 0;
        $colVentaMotos = [];
        $fecha = date('Y/m/d');
        $coleccionVentas = $this->getVentas();
        $numVenta = count($coleccionVentas) + 1;
    
        // Recorrer la colección de códigos de motos
        foreach ($colCodigosMoto as $codigoMoto) {
            // Buscar el objeto moto correspondiente al código
            $moto = $this->retornarMoto($codigoMoto);
    
            // Verificar si la moto está disponible para la venta y si el cliente está activo
            if ($moto !== null && $moto->getActiva() && $objCliente->getDadoDeBaja() === false) {
                // Incorporar la moto a la colección de motos de la venta
                $colVentaMotos[] = $moto;
    
                // Calcular el precio de venta de la moto y sumarlo al precio final de la venta
                $precioVenta = $moto->darPrecioVenta();
                $importeFinal += $precioVenta;
            }
        }
    
        // Crear una instancia de Venta con la información recopilada
        $venta = new Venta($numVenta, $fecha, $objCliente, $colVentaMotos, $importeFinal);
    
        // Agregar la venta a la colección de ventas de la Empresa
        $coleccionVentas[] = $venta;

        $this->setVentas($coleccionVentas);
    
        // Retornar el importe final de la venta
        return $importeFinal;
    }


    // Retorna todas las ventas de un cliente dado.
    public function retornarVentasXCliente($tipo, $numDoc) {
        // Inicializar la colección de ventas del cliente
        $ventasPorCliente = [];
    
        // Recorrer la colección de ventas de la empresa
        foreach ($this->ventas as $venta) {
            // Obtener el cliente asociado a la venta
            $clienteVenta = $venta->getCliente();
    
            // Verificar si el cliente asociado a la venta coincide con el cliente buscado
            if ($clienteVenta->getTipoDocumento() === $tipo && $clienteVenta->getNumDocumento() === $numDoc) {
                // Agregar la venta a la colección de ventas del cliente
                $ventasPorCliente[] = $venta;
            }
        }
    
        return $ventasPorCliente;
    }
    
    
    

    // Método __toString
    public function __toString() {
        $clientesInfo = "";
        foreach ($this->clientes as $cliente) {
            $clientesInfo .= $cliente->__toString() . "\n";
        }
    
        $motosInfo = "";
        foreach ($this->motos as $moto) {
            $motosInfo .= $moto->__toString() . "\n";
        }
    
        $ventasInfo = "";
        if (!empty($this->ventas)) {
            foreach ($this->ventas as $venta) {
                $ventasInfo .= $venta->__toString() . "\n";
            }
        } else {
            $ventasInfo = "No hay ventas registradas.\n";
        }
    
        return "Denominación: " . $this->getDenominacion() . "\nDirección: " . $this->getDireccion() . "\nClientes:\n" . $clientesInfo . "Motos:\n" . $motosInfo . "Ventas:\n" . $ventasInfo;
    }
}


