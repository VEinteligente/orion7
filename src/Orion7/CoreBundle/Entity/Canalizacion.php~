<?php

namespace Orion7\CoreBundle\Entity;

class Canalizacion
{
    protected $id;
    protected $comentario;
    protected $hora_registro;
    protected $incidente;
    protected $entes;
    protected $usuario;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->entes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setHoraRegistro(new \DateTime());
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
     * Set comentario
     *
     * @param string $comentario
     * @return Canalizacion
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    
        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set hora_registro
     *
     * @param \DateTime $horaRegistro
     * @return Canalizacion
     */
    public function setHoraRegistro($horaRegistro)
    {
        $this->hora_registro = $horaRegistro;
    
        return $this;
    }

    /**
     * Get hora_registro
     *
     * @return \DateTime 
     */
    public function getHoraRegistro()
    {
        return $this->hora_registro;
    }

    /**
     * Set incidente
     *
     * @param \Orion7\CoreBundle\Entity\Incidente $incidente
     * @return Canalizacion
     */
    public function setIncidente(\Orion7\CoreBundle\Entity\Incidente $incidente = null)
    {
        $this->incidente = $incidente;
    
        return $this;
    }

    /**
     * Get incidente
     *
     * @return \Orion7\CoreBundle\Entity\Incidente 
     */
    public function getIncidente()
    {
        return $this->incidente;
    }

    /**
     * Add entes
     *
     * @param \Orion7\CoreBundle\Entity\Ente $entes
     * @return Canalizacion
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