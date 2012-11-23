<?php
// src/Blogger/BlogBundle/Entity/Blog.php

namespace Orion7\CoreBundle\Entity;

class Tipo_denunciante
{
    protected $id;
    protected $nombre;
    protected $denuncias;
    protected $es_publico;
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
     * Set nombre
     *
     * @param string $nombre
     * @return Tipo_denunciante
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
     * Set es_publico
     *
     * @param boolean $esPublico
     * @return Tipo_denunciante
     */
    public function setEsPublico($esPublico)
    {
        $this->es_publico = $esPublico;
    
        return $this;
    }

    /**
     * Get es_publico
     *
     * @return boolean 
     */
    public function getEsPublico()
    {
        return $this->es_publico;
    }

    /**
     * Add denuncias
     *
     * @param \Orion7\CoreBundle\Entity\Denuncia $denuncias
     * @return Tipo_denunciante
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
}