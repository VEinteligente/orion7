<?php

namespace Orion7\CoreBundle\Entity;

class Municipio
{
    protected $id;
    protected $estado;
    protected $parroquias;
    protected $centros;
    protected $entes;
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
        $this->parroquias = new \Doctrine\Common\Collections\ArrayCollection();
        $this->centros = new \Doctrine\Common\Collections\ArrayCollection();
        $this->entes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Municipio
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
     * @return Municipio
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
     * @return Municipio
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
     * @return Municipio
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
     * Add parroquias
     *
     * @param \Orion7\CoreBundle\Entity\Parroquia $parroquias
     * @return Municipio
     */
    public function addParroquia(\Orion7\CoreBundle\Entity\Parroquia $parroquias)
    {
        $this->parroquias[] = $parroquias;
    
        return $this;
    }

    /**
     * Remove parroquias
     *
     * @param \Orion7\CoreBundle\Entity\Parroquia $parroquias
     */
    public function removeParroquia(\Orion7\CoreBundle\Entity\Parroquia $parroquias)
    {
        $this->parroquias->removeElement($parroquias);
    }

    /**
     * Get parroquias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getParroquias()
    {
        return $this->parroquias;
    }

    /**
     * Add centros
     *
     * @param \Orion7\CoreBundle\Entity\Centro $centros
     * @return Municipio
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
     * Add entes
     *
     * @param \Orion7\CoreBundle\Entity\Ente $entes
     * @return Municipio
     */
    public function addEnte(\Orion7\CoreBundle\Entity\Ente $entes)
    {
        $this->entes[] = $entes;
    
        return $this;
    }

    /**
     * Remove entes
     *
     * @param \Orion7\CoreBundle\Entity\Ente $entes
     */
    public function removeEnte(\Orion7\CoreBundle\Entity\Ente $entes)
    {
        $this->entes->removeElement($entes);
    }

    /**
     * Get entes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEntes()
    {
        return $this->entes;
    }

    /**
     * Add incidentes
     *
     * @param \Orion7\CoreBundle\Entity\Incidente $incidentes
     * @return Municipio
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
     * @return Municipio
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
}