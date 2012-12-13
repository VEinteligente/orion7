<?php
// src/Blogger/BlogBundle/Entity/Blog.php

namespace Orion7\CoreBundle\Entity;

class Subcategoria
{
    protected $id;
    protected $nombre;
    protected $descripcion;
    protected $asistencia;
    protected $categoria_ushahidi;
    protected $categoria;
    protected $articulos;
    protected $denuncias;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articulos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Subcategoria
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
     * @return Subcategoria
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
     * Set asistencia
     *
     * @param string $asistencia
     * @return Subcategoria
     */
    public function setAsistencia($asistencia)
    {
        $this->asistencia = $asistencia;
    
        return $this;
    }

    /**
     * Get asistencia
     *
     * @return string 
     */
    public function getAsistencia()
    {
        return $this->asistencia;
    }

    /**
     * Set categoria_ushahidi
     *
     * @param integer $categoriaUshahidi
     * @return Subcategoria
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
     * Set categoria
     *
     * @param \Orion7\CoreBundle\Entity\Categoria $categoria
     * @return Subcategoria
     */
    public function setCategoria(\Orion7\CoreBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return \Orion7\CoreBundle\Entity\Categoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Add articulos
     *
     * @param \Orion7\CoreBundle\Entity\Articulo $articulos
     * @return Subcategoria
     */
    public function addArticulo(\Orion7\CoreBundle\Entity\Articulo $articulos)
    {
        $this->articulos[] = $articulos;
    
        return $this;
    }

    /**
     * Remove articulos
     *
     * @param \Orion7\CoreBundle\Entity\Articulo $articulos
     */
    public function removeArticulo(\Orion7\CoreBundle\Entity\Articulo $articulos)
    {
        $this->articulos->removeElement($articulos);
    }

    /**
     * Get articulos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticulos()
    {
        return $this->articulos;
    }

    /**
     * Add denuncias
     *
     * @param \Orion7\CoreBundle\Entity\Denuncia $denuncias
     * @return Subcategoria
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