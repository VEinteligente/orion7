<?php

namespace Orion7\CoreBundle\Entity;

class Centro
{
    protected $codigo;
    protected $estado;
    protected $municipio;
    protected $parroquia;
    protected $codigo_municipio;
    protected $codigo_parroquia;
    protected $nombre;
    protected $direccion;
    protected $num_electores;
    protected $electores;
    protected $mesas;
    protected $nuevo;
    protected $latitud;
    protected $longitud;
    protected $incidentes;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->incidentes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set codigo
     *
     * @param integer $codigo
     * @return Centro
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
     * Set codigo_municipio
     *
     * @param integer $codigoMunicipio
     * @return Centro
     */
    public function setCodigoMunicipio($codigoMunicipio)
    {
        $this->codigo_municipio = $codigoMunicipio;
    
        return $this;
    }

    /**
     * Get codigo_municipio
     *
     * @return integer 
     */
    public function getCodigoMunicipio()
    {
        return $this->codigo_municipio;
    }

    /**
     * Set codigo_parroquia
     *
     * @param integer $codigoParroquia
     * @return Centro
     */
    public function setCodigoParroquia($codigoParroquia)
    {
        $this->codigo_parroquia = $codigoParroquia;
    
        return $this;
    }

    /**
     * Get codigo_parroquia
     *
     * @return integer 
     */
    public function getCodigoParroquia()
    {
        return $this->codigo_parroquia;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Centro
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
     * Set direccion
     *
     * @param string $direccion
     * @return Centro
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set electores
     *
     * @param integer $electores
     * @return Centro
     */
    public function setElectores($electores)
    {
        $this->electores = $electores;
    
        return $this;
    }

    /**
     * Get electores
     *
     * @return integer 
     */
    public function getElectores()
    {
        return $this->electores;
    }

    /**
     * Set mesas
     *
     * @param integer $mesas
     * @return Centro
     */
    public function setMesas($mesas)
    {
        $this->mesas = $mesas;
    
        return $this;
    }

    /**
     * Get mesas
     *
     * @return integer 
     */
    public function getMesas()
    {
        return $this->mesas;
    }

    /**
     * Set nuevo
     *
     * @param boolean $nuevo
     * @return Centro
     */
    public function setNuevo($nuevo)
    {
        $this->nuevo = $nuevo;
    
        return $this;
    }

    /**
     * Get nuevo
     *
     * @return boolean 
     */
    public function getNuevo()
    {
        return $this->nuevo;
    }

    /**
     * Set latitud
     *
     * @param float $latitud
     * @return Centro
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
     * @return Centro
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
     * Add incidentes
     *
     * @param \Orion7\CoreBundle\Entity\Incidente $incidentes
     * @return Centro
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
     * @return Centro
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
     * @return Centro
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

    /**
     * Set parroquia
     *
     * @param \Orion7\CoreBundle\Entity\Parroquia $parroquia
     * @return Centro
     */
    public function setParroquia(\Orion7\CoreBundle\Entity\Parroquia $parroquia = null)
    {
        $this->parroquia = $parroquia;
    
        return $this;
    }

    /**
     * Get parroquia
     *
     * @return \Orion7\CoreBundle\Entity\Parroquia 
     */
    public function getParroquia()
    {
        return $this->parroquia;
    }

    /**
     * Set num_electores
     *
     * @param integer $numElectores
     * @return Centro
     */
    public function setNumElectores($numElectores)
    {
        $this->num_electores = $numElectores;
    
        return $this;
    }

    /**
     * Get num_electores
     *
     * @return integer 
     */
    public function getNumElectores()
    {
        return $this->num_electores;
    }

    /**
     * Add electores
     *
     * @param \Orion7\CoreBundle\Entity\Elector $electores
     * @return Centro
     */
    public function addElectore(\Orion7\CoreBundle\Entity\Elector $electores)
    {
        $this->electores[] = $electores;
    
        return $this;
    }

    /**
     * Remove electores
     *
     * @param \Orion7\CoreBundle\Entity\Elector $electores
     */
    public function removeElectore(\Orion7\CoreBundle\Entity\Elector $electores)
    {
        $this->electores->removeElement($electores);
    }
}