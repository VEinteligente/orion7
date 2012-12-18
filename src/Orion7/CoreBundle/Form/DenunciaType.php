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
            'empty_value' => '',
        ));    

        $builder->add('relato', 'textarea');

        $builder->add('estado', 'choice', array(
            'choices'   => array(
                '' => '',
                '1' => 'Dtto. Capital',
                '22' => 'Amazonas',
                '2' => 'Anzoátegui',
                '3' => 'Apure',
                '4' => 'Aragua',
                '5' => 'Barinas',
                '6' => 'Bolívar',
                '7' => 'Carabobo',
                '8' => 'Cojedes',
                '23' => 'Delta Amacuro',
                '9' => 'Falcón',
                '10' => 'Guárico',
                '11' => 'Lara',
                '12' => 'Mérida',
                '13' => 'Miranda',
                '14' => 'Monagas',
                '15' => 'Nueva Esparta',
                '16' => 'Portuguesa',
                '17' => 'Sucre',
                '18' => 'Táchira',
                '19' => 'Trujillo',
                '24' => 'Vargas',
                '20' => 'Yaracuy',
                '21' => 'Zulia',
                ),
            'required'  => true,
            'mapped'  => false,
        ));

        $builder->add('municipio', 'choice', array(
            'choices'   => array('' => ''),
            'required'  => true,
            'mapped'  => false,
        ));

        $builder->add('parroquia', 'choice', array(
            'choices'   => array('' => ''),
            'required'  => true,
            'mapped'  => false,
        ));

        $builder->add('centro', 'choice', array(
            'choices'   => array('' => ''),
            'required'  => true,
            'mapped'  => false,
        ));

        $builder->add('codigo_centro', 'number', array(
            'mapped'  => false,
            'required'  => false,
        ));
        $builder->add('cedula_elector', 'number', array(
            'mapped'  => false,
            'required'  => false,
        ));

        $builder->add('categoria', 'choice', array(
            'choices'   => array(
                'Irregularidades con máquinas' =>  array(
                    '1' => 'Irregularidades con el SAI', 
                    '2' => 'Irregularidades con la membrana de votación (tarjetón)', 
                    '3' => 'Irregularidades con la pantalla', 
                    '4' => 'Máquina conectada durante el proceso de votación', 
                    '5' => 'Errores en la emisión de comprobantes', 
                    '6' => 'Errores en la emisión de actas', 
                    '7' => 'Irregularidades en la transmisión de datos', 
                    '8' => 'Falla general de máquina', 
                    '9' => 'Otros', 
                ),
                'Irregularidades con materiales y documentos' =>  array(
                    '10' => 'Irregularidades de tinta', 
                    '11' => 'Ausencia de material para pasar a voto manual', 
                    '12' => 'Manipulación/destrucción de actas', 
                    '13' => 'Irregularidades de cuaderno', 
                    '14' => 'Ausencia de material de votación', 
                    '15' => 'Error en boleta de voto manual', 
                    '16' => 'Otros', 
                ),
                'Irregularidades del proceso de votación' =>  array(
                    '17' => 'Irregularidades con el punto de información al elector', 
                    '18' => 'Ausencia de miembros de mesa', 
                    '19' => 'Ausencia de testigos de mesa', 
                    '20' => 'Centro abierto o cerrado injustificadamente', 
                    '21' => 'Acompañamiento injustificado', 
                    '22' => 'Usurpación de identidad / Voto múltiple', 
                    '23' => 'Irregularidades en el escrutinio y/o verificación ciudadana (auditoría)', 
                    '24' => 'Mesas paralelas', 
                    '25' => 'Otros', 
                ),
                'Manipulación del elector' =>  array(
                    '26' => 'Propaganda ', 
                    '27' => 'Compra de votos', 
                    '28' => 'Coacción del voto', 
                    '29' => 'Revisión injustificada del voto', 
                    '30' => 'Otros', 
                ),
                'Abuso de poder' =>  array(
                    '31' => 'Uso de recursos públicos injustificadamente', 
                    '32' => 'Negativa de acceso o salida al centro a miembro de mesa', 
                    '33' => 'Negativa de acceso o salida al centro a testigo de mesa', 
                    '34' => 'Negativa de acceso o salida al centro a elector', 
                    '35' => 'Paso preferencial injustificado de electores', 
                    '36' => 'Negativa de paso a voto manual injustificadamente', 
                    '37' => 'Detención injustificada', 
                    '38' => 'Otros', 
                ),
                'Violencia' =>  array(
                    '39' => 'Agresión verbal', 
                    '40' => 'Amedrentamiento o Amenaza', 
                    '41' => 'Agresión física sin armas', 
                    '42' => 'Agresión física con armas', 
                    '43' => 'Homicidio', 
                    '44' => 'Otros', 
                ),
                'Otros' =>  array(
                    '45' => 'Asistencia primaria', 
                    '46' => 'No denuncia', 
                    '47' => 'Otros', 
                ),

            ),
            'required'  => true,
            'mapped'  => false,
            'multiple' => 'true',
        ));

        $builder->add('incidente_existente', 'choice', array(
            'choices'   => array('0' => 'Nuevo Incidente'),
            'required'  => true,
            'mapped'  => false,
            'expanded' => true,
        ));

        $builder->add('tipo_denunciante', 'entity', array(
            'class' => 'Orion7CoreBundle:TipoDenunciante',
            'property' => 'nombre',
            'empty_value' => '',
        ));


        $builder->add('responsables', 'entity', array(
            'class' => 'Orion7CoreBundle:Responsable',
            'property' => 'nombre',
            'multiple' => 'true',
            'empty_value' => '',
        ));

        $datetime = new \DateTime('now');

        $builder->add('hora_hecho', 'time', array(
            'input'  => 'datetime',
            'widget' => 'choice',
            'data' => $datetime
        ));


        $builder->add('nombre_denunciante', 'text', array(
            'required'  => false,
        ));
        $builder->add('telefono_denunciante', 'text', array(
            'required'  => false,
        ));
        $builder->add('correo_denunciante', 'email', array(
            'required'  => false,
        ));
        $builder->add('twitter_denunciante', 'text', array(
            'required'  => false,
        ));
        $builder->add('genera_retraso', 'checkbox', array(
            'label'     => 'Genera retraso',
            'required'  => false,
        ));
        $builder->add('autorizacion_cne', 'checkbox', array(
            'label'     => 'Autoriza denuncia formal ante el CNE',
            'required'  => false,
        ));
    }

    public function getName()
    {
        return 'denunciatype';
    }
}