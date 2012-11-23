<?php
// src/Blogger/BlogBundle/Entity/Blog.php

namespace Orion7\CoreBundle\Entity;

class Categoria
{
    protected $id;
    protected $nombre;
    protected $descripcion;
    protected $categoria_ushahidi;
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
     * Set nombre
     *
     * @param string $nombre
     * @return Categoria
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Categoria
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set categoria_ushahidi
     *
     * @param integer $categoriaUshahidi
     * @return Categoria
     */
    public function setCategoriaUshahidi($categoriaUshahidi)
    {
        $this->categoria_ushahidi = $categoriaUshahidi;
    
        return $this;
    }

    /**
     * Get categoria_ushahidi
     *
     * @return integer 
     */
    public function getCategoriaUshahidi()
    {
        return $this->categoria_ushahidi;
    }

    /**
     * Add subcategorias
     *
     * @param \Orion7\CoreBundle\Entity\Subcategoria $subcategorias
     * @return Categoria
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