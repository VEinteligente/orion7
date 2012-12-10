<?php

namespace Orion7\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CanalizacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('comentario', 'textarea');

        //TODO: agregar consulta custom que agarre los entes con ubicacion null y los entes con ubicacion igual a la ubicacion del incidente. Se puede?
        $builder->add('entes', 'entity', array(
            'class' => 'Orion7CoreBundle:Ente',
            'property' => 'nombre',
            'multiple' => 'true',
            'empty_value' => '',
        ));
    }

    public function getName()
    {
        return 'canalizaciontype';
    }
}