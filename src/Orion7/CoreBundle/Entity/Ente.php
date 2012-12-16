<?php

namespace Orion7\CoreBundle\Entity;

class Ente
{
    protected $id;
    protected $nombre;
    protected $estado;
    protected $municipio;
    protected $telefonos;
    protected $incidentes;
    protected $telefono;
    protected $tipo_ente;
   
    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set telefono
     *
     * @param string $telefono
     * @return Ente
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set tipo_ente
     *
     * @param \Orion7\CoreBundle\Entity\TipoEnte $tipoEnte
     * @return Ente
     */
    public function setTipoEnte(\Orion7\CoreBundle\Entity\TipoEnte $tipoEnte = null)
    {
        $this->tipo_ente = $tipoEnte;
    
        return $this;
    }

    /**
     * Get tipo_ente
     *
     * @return \Orion7\CoreBundle\Entity\TipoEnte 
     */
    public function getTipoEnte()
    {
        return $this->tipo_ente;
    }

    /**
     * Set estado
     *
     * @param \Orion7\CoreBundle\Entity\Estado $estado
     * @return Ente
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
     * @return Ente
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
     * Add incidentes
     *
     * @param \Orion7\CoreBundle\Entity\Incidente $incidentes
     * @return Ente
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
     * Set nombre
     *
     * @param string $nombre
     * @return Ente
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
}