<?php
// src/Blogger/BlogBundle/Entity/Blog.php

namespace Orion7\CoreBundle\Entity;

class Parroquia
{
    protected $id;
    protected $estado;
    protected $municipio;
    protected $centros;
    protected $incidentes;
    protected $codigo;
    protected $nombre;
    protected $latitud;
    protected $longitud;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->centros = new \Doctrine\Common\Collections\ArrayCollection();
        $this->incidentes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codigo
     *
     * @param integer $codigo
     * @return Parroquia
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    
        return $this;
    }

    /**
     * Get codigo
     *
     * @return integer 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Parroquia
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set latitud
     *
     * @param float $latitud
     * @return Parroquia
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    
        return $this;
    }

    /**
     * Get latitud
     *
     * @return float 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param float $longitud
     * @return Parroquia
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    
        return $this;
    }

    /**
     * Get longitud
     *
     * @return float 
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Add centros
     *
     * @param \Orion7\CoreBundle\Entity\Centro $centros
     * @return Parroquia
     */
    public function addCentro(\Orion7\CoreBundle\Entity\Centro $centros)
    {
        $this->centros[] = $centros;
    
        return $this;
    }

    /**
     * Remove centros
     *
     * @param \Orion7\CoreBundle\Entity\Centro $centros
     */
    public function removeCentro(\Orion7\CoreBundle\Entity\Centro $centros)
    {
        $this->centros->removeElement($centros);
    }

    /**
     * Get centros
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCentros()
    {
        return $this->centros;
    }

    /**
     * Add incidentes
     *
     * @param \Orion7\CoreBundle\Entity\Incidente $incidentes
     * @return Parroquia
     */
    public function addIncidente(\Orion7\CoreBundle\Entity\Incidente $incidentes)
    {
        $this->incidentes[] = $incidentes;
    
        return $this;
    }

    /**
     * Remove incidentes
     *
     * @param \Orion7\CoreBundle\Entity\Incidente $incidentes
     */
    public function removeIncidente(\Orion7\CoreBundle\Entity\Incidente $incidentes)
    {
        $this->incidentes->removeElement($incidentes);
    }

    /**
     * Get incidentes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIncidentes()
    {
        return $this->incidentes;
    }

    /**
     * Set estado
     *
     * @param \Orion7\CoreBundle\Entity\Estado $estado
     * @return Parroquia
     */
    public function setEstado(\Orion7\CoreBundle\Entity\Estado $estado = null)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return \Orion7\CoreBundle\Entity\Estado 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set municipio
     *
     * @param \Orion7\CoreBundle\Entity\Municipio $municipio
     * @return Parroquia
     */
    public function setMunicipio(\Orion7\CoreBundle\Entity\Municipio $municipio = null)
    {
        $this->municipio = $municipio;
    
        return $this;
    }

    /**
     * Get municipio
     *
     * @return \Orion7\CoreBundle\Entity\Municipio 
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }
}