<?php

namespace Orion7\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Denuncia
{
    protected $id;
    protected $incidente;
    protected $relato;
    protected $via;
    protected $tipo_denunciante;
    protected $hora_hecho;
    protected $hora_registro;
    protected $subcategorias;
    protected $nombre_denunciante;
    protected $telefono_denunciante;
    protected $correo_denunciante;
    protected $twitter_denunciante;
    protected $genera_retraso;
    protected $usuario_registro;
    protected $usuario_filtrado;
    protected $responsables;
    protected $isFiltrado;
    protected $id_ushahidi;
    protected $autorizacion_cne;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->responsables = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subcategorias = new \Doctrine\Common\Collections\ArrayCollection();

        $this->setIsFiltrado(false);
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
     * Set hora_hecho
     *
     * @param \DateTime $horaHecho
     * @return Denuncia
     */
    public function setHoraHecho($horaHecho)
    {
        $this->hora_hecho = $horaHecho;
    
        return $this;
    }

    /**
     * Get hora_hecho
     *
     * @return \DateTime 
     */
    public function getHoraHecho()
    {
        return $this->hora_hecho;
    }

    /**
     * Set hora_registro
     *
     * @param \DateTime $horaRegistro
     * @return Denuncia
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
     * Set relato
     *
     * @param string $relato
     * @return Denuncia
     */
    public function setRelato($relato)
    {
        $this->relato = $relato;
    
        return $this;
    }

    /**
     * Get relato
     *
     * @return string 
     */
    public function getRelato()
    {
        return $this->relato;
    }

    /**
     * Set nombre_denunciante
     *
     * @param string $nombreDenunciante
     * @return Denuncia
     */
    public function setNombreDenunciante($nombreDenunciante)
    {
        $this->nombre_denunciante = $nombreDenunciante;
    
        return $this;
    }

    /**
     * Get nombre_denunciante
     *
     * @return string 
     */
    public function getNombreDenunciante()
    {
        return $this->nombre_denunciante;
    }

    /**
     * Set correo_denunciante
     *
     * @param string $correoDenunciante
     * @return Denuncia
     */
    public function setCorreoDenunciante($correoDenunciante)
    {
        $this->correo_denunciante = $correoDenunciante;
    
        return $this;
    }

    /**
     * Get correo_denunciante
     *
     * @return string 
     */
    public function getCorreoDenunciante()
    {
        return $this->correo_denunciante;
    }

    /**
     * Set twitter_denunciante
     *
     * @param string $twitterDenunciante
     * @return Denuncia
     */
    public function setTwitterDenunciante($twitterDenunciante)
    {
        $this->twitter_denunciante = $twitterDenunciante;
    
        return $this;
    }

    /**
     * Get twitter_denunciante
     *
     * @return string 
     */
    public function getTwitterDenunciante()
    {
        return $this->twitter_denunciante;
    }

    /**
     * Set genera_retraso
     *
     * @param boolean $generaRetraso
     * @return Denuncia
     */
    public function setGeneraRetraso($generaRetraso)
    {
        $this->genera_retraso = $generaRetraso;
    
        return $this;
    }

    /**
     * Get genera_retraso
     *
     * @return boolean 
     */
    public function getGeneraRetraso()
    {
        return $this->genera_retraso;
    }

    /**
     * Set incidente
     *
     * @param \Orion7\CoreBundle\Entity\Incidente $incidente
     * @return Denuncia
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
     * Set via
     *
     * @param \Orion7\CoreBundle\Entity\Via $via
     * @return Denuncia
     */
    public function setVia(\Orion7\CoreBundle\Entity\Via $via = null)
    {
        $this->via = $via;
    
        return $this;
    }

    /**
     * Get via
     *
     * @return \Orion7\CoreBundle\Entity\Via 
     */
    public function getVia()
    {
        return $this->via;
    }

    /**
     * Set tipo_denunciante
     *
     * @param \Orion7\CoreBundle\Entity\TipoDenunciante $tipoDenunciante
     * @return Denuncia
     */
    public function setTipoDenunciante(\Orion7\CoreBundle\Entity\TipoDenunciante $tipoDenunciante = null)
    {
        $this->tipo_denunciante = $tipoDenunciante;
    
        return $this;
    }

    /**
     * Get tipo_denunciante
     *
     * @return \Orion7\CoreBundle\Entity\TipoDenunciante 
     */
    public function getTipoDenunciante()
    {
        return $this->tipo_denunciante;
    }

    /**
     * Add responsables
     *
     * @param \Orion7\CoreBundle\Entity\Responsable $responsables
     * @return Denuncia
     */
    public function addResponsable(\Orion7\CoreBundle\Entity\Responsable $responsables)
    {
        $this->responsables[] = $responsables;
    
        return $this;
    }

    /**
     * Remove responsables
     *
     * @param \Orion7\CoreBundle\Entity\Responsable $responsables
     */
    public function removeResponsable(\Orion7\CoreBundle\Entity\Responsable $responsables)
    {
        $this->responsables->removeElement($responsables);
    }

    /**
     * Get responsables
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResponsables()
    {
        return $this->responsables;
    }

    /**
     * Add subcategorias
     *
     * @param \Orion7\CoreBundle\Entity\Subcategoria $subcategorias
     * @return Denuncia
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
     * Remove subcategorias
     *
     */
    public function removeAllSubcategoria()
    {   foreach ($this->subcategorias as $subcategoria) {
            $this->removeSubcategoria($subcategoria);
        }
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

    /**
     * Set telefono_denunciante
     *
     * @param string $telefonoDenunciante
     * @return Denuncia
     */
    public function setTelefonoDenunciante($telefonoDenunciante)
    {
        $this->telefono_denunciante = $telefonoDenunciante;
    
        return $this;
    }

    /**
     * Get telefono_denunciante
     *
     * @return string 
     */
    public function getTelefonoDenunciante()
    {
        return $this->telefono_denunciante;
    }

    /**
     * Set usuario_registro
     *
     * @param \Orion7\CoreBundle\Entity\Usuario $usuarioRegistro
     * @return Denuncia
     */
    public function setUsuarioRegistro(\Orion7\CoreBundle\Entity\Usuario $usuarioRegistro = null)
    {
        $this->usuario_registro = $usuarioRegistro;
    
        return $this;
    }

    /**
     * Get usuario_registro
     *
     * @return \Orion7\CoreBundle\Entity\Usuario 
     */
    public function getUsuarioRegistro()
    {
        return $this->usuario_registro;
    }

    /**
     * Set usuario_filtrado
     *
     * @param \Orion7\CoreBundle\Entity\Usuario $usuarioFiltrado
     * @return Denuncia
     */
    public function setUsuarioFiltrado(\Orion7\CoreBundle\Entity\Usuario $usuarioFiltrado = null)
    {
        $this->usuario_filtrado = $usuarioFiltrado;
    
        return $this;
    }

    /**
     * Get usuario_filtrado
     *
     * @return \Orion7\CoreBundle\Entity\Usuario 
     */
    public function getUsuarioFiltrado()
    {
        return $this->usuario_filtrado;
    }

    /**
     * Set isFiltrado
     *
     * @param boolean $isFiltrado
     * @return Denuncia
     */
    public function setIsFiltrado($isFiltrado)
    {
        $this->isFiltrado = $isFiltrado;
    
        return $this;
    }

    /**
     * Get isFiltrado
     *
     * @return boolean 
     */
    public function getIsFiltrado()
    {
        return $this->isFiltrado;
    }

    /**
     * Set autorizacion_cne
     *
     * @param boolean $autorizacionCne
     * @return Denuncia
     */
    public function setAutorizacionCne($autorizacionCne)
    {
        $this->autorizacion_cne = $autorizacionCne;
    
        return $this;
    }

    /**
     * Get autorizacion_cne
     *
     * @return boolean 
     */
    public function getAutorizacionCne()
    {
        return $this->autorizacion_cne;
    }

    /**
     * Set id_ushahidi
     *
     * @param integer $idUshahidi
     * @return Denuncia
     */
    public function setIdUshahidi($idUshahidi)
    {
        $this->id_ushahidi = $idUshahidi;
    
        return $this;
    }

    /**
     * Get id_ushahidi
     *
     * @return integer 
     */
    public function getIdUshahidi()
    {
        return $this->id_ushahidi;
    }
}