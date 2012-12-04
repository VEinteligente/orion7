<?php

namespace Orion7\CoreBundle\Entity;

class Incidente
{
    protected $id;
    protected $estado;
    protected $municipio;
    protected $parroquia;
    protected $centro;
    protected $ente;
    protected $denuncias;
    protected $resuelto;
    protected $canalizaciones;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->denuncias = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add denuncias
     *
     * @param \Orion7\CoreBundle\Entity\Denuncia $denuncias
     * @return Incidente
     */
    public function addDenuncia(\Orion7\CoreBundle\Entity\Denuncia $denuncias)
    {
        $this->denuncias[] = $denuncias;
    
        return $this;
    }

    /**
     * Remove denuncias
     *
     * @param \Orion7\CoreBundle\Entity\Denuncia $denuncias
     */
    public function removeDenuncia(\Orion7\CoreBundle\Entity\Denuncia $denuncias)
    {
        $this->denuncias->removeElement($denuncias);
    }

    /**
     * Get denuncias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDenuncias()
    {
        return $this->denuncias;
    }

    /**
     * Set estado
     *
     * @param \Orion7\CoreBundle\Entity\Estado $estado
     * @return Incidente
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
     * @return Incidente
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
     * @return Incidente
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
     * Set centro
     *
     * @param \Orion7\CoreBundle\Entity\Centro $centro
     * @return Incidente
     */
    public function setCentro(\Orion7\CoreBundle\Entity\Centro $centro = null)
    {
        $this->centro = $centro;
    
        return $this;
    }

    /**
     * Get centro
     *
     * @return \Orion7\CoreBundle\Entity\Centro 
     */
    public function getCentro()
    {
        return $this->centro;
    }

    /**
     * Set resuelto
     *
     * @param boolean $resuelto
     * @return Incidente
     */
    public function setResuelto($resuelto)
    {
        $this->resuelto = $resuelto;
    
        return $this;
    }

    /**
     * Get resuelto
     *
     * @return boolean 
     */
    public function getResuelto()
    {
        return $this->resuelto;
    }
}