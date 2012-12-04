<?php

namespace Orion7\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DenunciaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('relato', 'textarea');

        $builder->add('via', 'entity', array(
            'class' => 'Orion7CoreBundle:Via',
            'property' => 'nombre',
        ));

        $builder->add('tipo_denunciante', 'entity', array(
            'class' => 'Orion7CoreBundle:TipoDenunciante',
            'property' => 'nombre',
        ));

        $builder->add('responsables', 'entity', array(
            'class' => 'Orion7CoreBundle:TipoDenunciante',
            'property' => 'nombre',
            'multiple' => 'true',
        ));

        //TODO: agregar faltantes. Creo que hace falta agregar un atributo "categorias" en Denuncia, 
        // luego tener un "choice" que renderice en un select vacio que se pueda llenar luego. maybe.

        $builder->add('hora_hecho', 'time', array(
            'input'  => 'datetime',
            'widget' => 'choice',
        ));


        $builder->add('nombre_denunciante');
        $builder->add('telefono_denunciante');
        $builder->add('correo_denunciante', 'email');
        $builder->add('twitter_denunciante');
        $builder->add('genera_retraso', 'checkbox', array(
            'label'     => 'Genera retraso',
            'required'  => false,
        ));
    }

    public function getName()
    {
        return 'denunciatype';
    }
}