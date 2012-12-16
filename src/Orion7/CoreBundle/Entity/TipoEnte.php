<?php

namespace Orion7\CoreBundle\Entity;

class TipoEnte
{
    protected $id;
    protected $nombre;
    protected $entes;
    protected $tipo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->entes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tipo
     *
     * @param string $tipo
     * @return TipoEnte
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Add entes
     *
     * @param \Orion7\CoreBundle\Entity\Ente $entes
     * @return TipoEnte
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
}