<?php

namespace Orion7\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MensajeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('texto', 'textarea');

    }

    public function getName()
    {
        return 'mensajetype';
    }
}