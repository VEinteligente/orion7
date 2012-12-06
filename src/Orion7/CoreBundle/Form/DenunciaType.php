<?php

namespace Orion7\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DenunciaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('via', 'entity', array(
            'class' => 'Orion7CoreBundle:Via',
            'property' => 'nombre',
        ));    

        $builder->add('relato', 'textarea');

        $builder->add('estado', 'choice', array(
            'choices'   => array(
                '1' => 'DTTO. CAPITAL',
                '2' => 'ANZOATEGUI',
                '3' => 'APURE',
                '4' => 'ARAGUA',
                '5' => 'BARINAS',
                '6' => 'BOLIVAR',
                '7' => 'CARABOBO',
                '8' => 'COJEDES',
                '9' => 'FALCON',
                '10' => 'GUARICO',
                '11' => 'LARA',
                '12' => 'MERIDA',
                '13' => 'MIRANDA',
                '14' => 'MONAGAS',
                '15' => 'NUEVA ESPARTA',
                '16' => 'PORTUGUESA',
                '17' => 'SUCRE',
                '18' => 'TACHIRA',
                '19' => 'TRUJILLO',
                '20' => 'YARACUY',
                '21' => 'ZULIA',
                '22' => 'AMAZONAS',
                '23' => 'DELTA AMACURO',
                '24' => 'VARGAS'
                ),
            'required'  => true,
            'mapped'  => false,
        ));

        $builder->add('municipio', 'choice', array(
            'choices'   => array('0' => 'Selecciona un Municipio'),
            'required'  => true,
            'mapped'  => false,
        ));

        $builder->add('parroquia', 'choice', array(
            'choices'   => array('0' => 'Selecciona una Parroquia'),
            'required'  => true,
            'mapped'  => false,
        ));

        $builder->add('centro', 'choice', array(
            'choices'   => array('0' => 'Selecciona un Centro'),
            'required'  => true,
            'mapped'  => false,
        ));

        $builder->add('categoria', 'choice', array(
            'choices'   => array(
                '0' => 'Selecciona una Categoría',
                '1' => 'Irregularidades con máquinas',
                '2' => 'Irregularidades con materiales y documentos',
                '3' => 'Irregularidades del proceso de votación',
                '4' => 'Manipulación del elector',
                '5' => 'Abuso de poder',
                '6' => 'Violencia'
                ),
            'required'  => true,
            'mapped'  => false,
        ));

        $builder->add('subcategorias', 'entity', array(
            'class' => 'Orion7CoreBundle:Subcategoria',
            'property' => 'nombre',
        ));

        $builder->add('tipo_denunciante', 'entity', array(
            'class' => 'Orion7CoreBundle:TipoDenunciante',
            'property' => 'nombre',
        ));


        $builder->add('responsables', 'entity', array(
            'class' => 'Orion7CoreBundle:Responsable',
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