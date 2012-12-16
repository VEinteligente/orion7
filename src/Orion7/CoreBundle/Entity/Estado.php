<?php

namespace Orion7\CoreBundle\Entity;

class Estado
{
    protected $codigo;
    protected $nombre;
    protected $municipios;
    protected $parroquias;
    protected $centros;
    protected $entes;
    protected $incidentes;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->municipios = new \Doctrine\Common\Collections\ArrayCollection();
        $this->parroquias = new \Doctrine\Common\Collections\ArrayCollection();
        $this->centros = new \Doctrine\Common\Collections\ArrayCollection();
        $this->entes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->incidentes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set codigo
     *
     * @param integer $codigo
     * @return Estado
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
     * @return Estado
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
     * Add municipios
     *
     * @param \Orion7\CoreBundle\Entity\Municipio $municipios
     * @return Estado
     */
    public function addMunicipio(\Orion7\CoreBundle\Entity\Municipio $municipios)
    {
        $this->municipios[] = $municipios;
    
        return $this;
    }

    /**
     * Remove municipios
     *
     * @param \Orion7\CoreBundle\Entity\Municipio $municipios
     */
    public function removeMunicipio(\Orion7\CoreBundle\Entity\Municipio $municipios)
    {
        $this->municipios->removeElement($municipios);
    }

    /**
     * Get municipios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMunicipios()
    {
        return $this->municipios;
    }

    /**
     * Add parroquias
     *
     * @param \Orion7\CoreBundle\Entity\Parroquia $parroquias
     * @return Estado
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
     * @return Estado
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
     * @return Estado
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
     * @return Estado
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
}