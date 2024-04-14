<?php

class Venta {
    private $numero;
    private $fecha;
    private $cliente; // referencia a la clase cliente.
    private $motos; // referencia a la clase moto.
    private $precioFinal;

    // Constructor
    public function __construct($numero, $fecha, $cliente, $motos, $precioFinal) {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->motos = $motos;
        $this->precioFinal = $precioFinal;
    }

    // Métodos Get
    public function getNumero() {
        return $this->numero;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getMotos() {
        return $this->motos;
    }

    public function getPrecioFinal() {
        return $this->precioFinal;
    }

    // Métodos Set
    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setMotos($motos) {
        $this->motos = $motos;
    }

    public function setPrecioFinal($precioFinal) {
        $this->precioFinal = $precioFinal;
    }


    // Incorpora un objeto moto a la coleccion de motos en venta. 
    public function incorporarMoto($objMoto) {

        $motoIncorporada = false;
        if ($objMoto->getActiva()) {

            $precioMoto = $objMoto->darPrecioVenta();
            $this->setPrecioFinal($this->getPrecioFinal() + $precioMoto);
            $motosCargadas = $this->getMotos();
            $motosCargadas[] = $objMoto;
            $this->setMotos($motosCargadas);
            $motoIncorporada = true;
        } 

        return $motoIncorporada;
    }


    // Método __toString 
    public function __toString() {
        $motosInfo = "";
        foreach ($this->motos as $moto) {
            $motosInfo .= $moto->__toString() . "\n";
        }

        return "Número de venta: " . $this->getNumero() . ", Fecha: " . $this->getFecha() . ", Cliente: " . $this->getCliente()->__toString() . "\nMotos:\n" . $motosInfo . "Precio Final: $" . $this->getPrecioFinal();
    }
}


