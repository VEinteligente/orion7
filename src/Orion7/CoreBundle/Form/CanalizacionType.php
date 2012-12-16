<?php

namespace Orion7\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CanalizacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('comentario', 'textarea');

        $builder->add('entes', 'entity', array(
            'class' => 'Orion7CoreBundle:Ente',
            'property' => 'nombre',
            'multiple' => 'true',
            'empty_value' => '',
        ));

        $builder->add('marcarResuelto', 'checkbox', array(
            'label'     => 'Marcar como resuelto',
            'mapped'  => false,
            'required'  => false,
        ));
    }

    public function getName()
    {
        return 'canalizaciontype';
    }
}