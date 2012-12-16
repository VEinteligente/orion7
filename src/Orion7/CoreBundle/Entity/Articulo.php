<?php

namespace Orion7\CoreBundle\Entity;

class Articulo
{
    protected $id;
    protected $numero;
    protected $contenido;
    protected $ley;
    protected $subcategorias;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subcategorias = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set numero
     *
     * @param integer $numero
     * @return Articulo
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return Articulo
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    
        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set ley
     *
     * @param \Orion7\CoreBundle\Entity\Ley $ley
     * @return Articulo
     */
    public function setLey(\Orion7\CoreBundle\Entity\Ley $ley = null)
    {
        $this->ley = $ley;
    
        return $this;
    }

    /**
     * Get ley
     *
     * @return \Orion7\CoreBundle\Entity\Ley 
     */
    public function getLey()
    {
        return $this->ley;
    }

    /**
     * Add subcategorias
     *
     * @param \Orion7\CoreBundle\Entity\Subcategoria $subcategorias
     * @return Articulo
     */
    public function addSubcategoria(\Orion7\CoreBundle\Entity\Subcategoria $subcategorias)
    {
        $this->subcategorias[] = $subcategorias;
    
        return $this;
    }

    /**
     * Remove subcategorias
     *
     * @param \Orion7\CoreBundle\Entity\Subcategoria $subcategorias
     */
    public function removeSubcategoria(\Orion7\CoreBundle\Entity\Subcategoria $subcategorias)
    {
        $this->subcategorias->removeElement($subcategorias);
    }

    /**
     * Get subcategorias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubcategorias()
    {
        return $this->subcategorias;
    }
}