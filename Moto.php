<?php

class Moto
{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;

    // Constructor
    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa)
    {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;
    }

    // Métodos Get
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getCosto()
    {
        return $this->costo;
    }

    public function getAnioFabricacion()
    {
        return $this->anioFabricacion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPorcentajeIncrementoAnual()
    {
        return $this->porcentajeIncrementoAnual;
    }

    public function getActiva()
    {
        return $this->activa;
    }

    // Métodos Set
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    public function setAnioFabricacion($anioFabricacion)
    {
        $this->anioFabricacion = $anioFabricacion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual)
    {
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    }

    public function setActiva($activa)
    {
        $this->activa = $activa;
    }


    /* Método para obtener el precio de venta de la moto.
    * $_venta = $_compra + $_compra * (anio * por_inc_anual)
    donde $_compra: es el costo de la moto.
    anio: cantidad de años transcurridos desde que se fabricó la moto.
    por_inc_anual: porcentaje de incremento anual de la moto.
    */
    public function darPrecioVenta()
    {

        $precioVenta = 0;
        if (!$this->getActiva()) {
            $precioVenta = -1;
        } else {
            $anioTranscurrido = intval(date("Y")) - $this->getAnioFabricacion();
            $precioVenta = $this->getCosto() + $this->getCosto() * ($anioTranscurrido * ($this->getPorcentajeIncrementoAnual() / 100));
        }
        return $precioVenta;
    }


    // Método __toString
    public function __toString()
    {
        $estado = $this->activa ? 'Disponible para venta' : 'No disponible para venta';
        return "Código: {$this->getCodigo()}, Costo: {$this->getCosto()}, Año de Fabricación: {$this->getAnioFabricacion()}, Descripción: {$this->getDescripcion()}, Porcentaje de Incremento Anual: {$this->getPorcentajeIncrementoAnual()} %, Estado: {$estado}";
    }
}
