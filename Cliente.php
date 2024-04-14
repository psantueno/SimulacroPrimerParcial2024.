<?php

class Cliente
{
    private $nombre;
    private $apellido;
    private $dadoDeBaja;
    private $tipoDocumento;
    private $numDocumento;

    // Constructor
    public function __construct($nombre, $apellido, $dadoDeBaja, $tipoDocumento, $numDocumento)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dadoDeBaja = $dadoDeBaja;
        $this->tipoDocumento = $tipoDocumento;
        $this->numDocumento = $numDocumento;
    }

    // Métodos Get
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getDadoDeBaja()
    {
        return $this->dadoDeBaja;
    }

    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    public function getNumDocumento()
    {
        return $this->numDocumento;
    }



    // Métodos SET
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setDadoDeBaja($dadoDeBaja)
    {
        $this->dadoDeBaja = $dadoDeBaja;
    }

    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
    }

    public function setNumDocumento($numDocumento)
    {
        $this->numDocumento = $numDocumento;
    }

    // Método __toString
    public function __toString()
    {
        $estado = $this->dadoDeBaja ? 'Dado de baja' : 'Activo';
        return "Nombre: {$this->getNombre() }, Apellido: {$this->getApellido() }, Estado: {$estado}, Tipo de Documento: {$this->getTipoDocumento() }, Número de Documento: {$this->getNumDocumento()}";
    }
}
