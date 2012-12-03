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

        //TODO: agregar faltantes


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