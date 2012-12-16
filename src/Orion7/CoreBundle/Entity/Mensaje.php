<?php

namespace Orion7\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mensaje
 */
class Mensaje
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $texto;

    /**
     * @var string
     */
    private $rolDestinado;

    /**
     * @var \DateTime
     */
    private $horaCreado;

    /**
     * @var \Orion7\CoreBundle\Entity\Usuario
     */
    private $usuario;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setHoraCreado(new \DateTime());
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
     * Set texto
     *
     * @param string $texto
     * @return Mensaje
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
    
        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set rolDestinado
     *
     * @param string $rolDestinado
     * @return Mensaje
     */
    public function setRolDestinado($rolDestinado)
    {
        $this->rolDestinado = $rolDestinado;
    
        return $this;
    }

    /**
     * Get rolDestinado
     *
     * @return string 
     */
    public function getRolDestinado()
    {
        return $this->rolDestinado;
    }

    /**
     * Set horaCreado
     *
     * @param \DateTime $horaCreado
     * @return Mensaje
     */
    public function setHoraCreado($horaCreado)
    {
        $this->horaCreado = $horaCreado;
    
        return $this;
    }

    /**
     * Get horaCreado
     *
     * @return \DateTime 
     */
    public function getHoraCreado()
    {
        return $this->horaCreado;
    }

    /**
     * Set usuario
     *
     * @param \Orion7\CoreBundle\Entity\Usuario $usuario
     * @return Mensaje
     */
    public function setUsuario(\Orion7\CoreBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Orion7\CoreBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}