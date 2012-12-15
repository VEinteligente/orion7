<?php

namespace Orion7\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 */
class DenunciaRepository extends EntityRepository
{
	public function findDenunciasDeIncidente($idIncidente)
    {
        $qb = $this->createQueryBuilder('d')
                   ->select('d')
                   ->where('d.incidente = :incidente')
                   ->setParameter('incidente', $idIncidente);

        return $qb->getQuery()
                  ->getResult();
    }

    public function findByIncidentesAsignados($incidentesAsignados)
    {
      if (count($incidentesAsignados)==0) return array();

      $qb = $this->createQueryBuilder('d');
      $qb->select('d');
      $qb->where($qb->expr()->in('d.incidente', $incidentesAsignados ));

      return $qb->getQuery()
                ->getResult();
    }

    public function sendUshahidiReport($data)
    {
      
        $process = curl_init();
      
        //return $data;

    curl_setopt($process, CURLOPT_URL,'http://votojoven.com/den16do7/api?task=report');
    curl_setopt($process, CURLOPT_TIMEOUT, 30);
    // permitir envio de informacion por POST
    curl_setopt($process, CURLOPT_POST, TRUE); 
    // colocar campos a ser posteados
    curl_setopt($process, CURLOPT_POSTFIELDS, $data);
    // capacidad para tener una respuesta de la solicitud hecha
    curl_setopt($process, CURLOPT_RETURNTRANSFER,TRUE);
    // ejecutar la llamada curl
    $ret_val = curl_exec($process);
    // Check if any error occured
    if(!curl_errno($process))
    {
      $respuesta_json = json_decode(curl_multi_getcontent($process),true);
      $id_ushahidi = $respuesta_json['details']['id']; 
      //Id del reporte ushahidi, meter en campo correspondiente en incidente
    }

    // Close handle
    curl_close($process);

    $process = curl_init();
    // set url para hacer el request
    // Preparar array con datos a postear
    // array with the field name as key and field data as value
    $data2 = array(
      'task' => 'reports', 
      'action' => 'approve', 
      'incident_id' => $id_ushahidi
      );
    curl_setopt($process, CURLOPT_URL,'http://votojoven.com/den16do7/api?task=reports');
    // habilitar envío de headers
    curl_setopt($process, CURLOPT_HEADER, 1);
    // enviar datos de autenticacion
    curl_setopt($process, CURLOPT_USERPWD, 'admin:uLtr4bo0k$12');

    curl_setopt($process, CURLOPT_TIMEOUT, 30);
    // permitir envio de informacion por POST
    curl_setopt($process, CURLOPT_POST, TRUE); 
    // colocar campos a ser posteados
    curl_setopt($process, CURLOPT_POSTFIELDS, $data2);
    // capacidad para tener una respuesta de la solicitud hecha
    curl_setopt($process, CURLOPT_RETURNTRANSFER,TRUE);
    // ejecutar la llamada curl
    $ret_val = curl_exec($process);

    // Check if any error occured
    if(!curl_errno($process))
    {
      $mensaje = "Procesado con éxito";
      //$info = curl_getinfo($process);
      //echo 'Took ' . $info['total_time'] . ' seconds to send a request to ' . $info['url'].'<br>';
      //echo $info['CURLINFO_HTTP_CODE'];
      //echo curl_multi_getcontent($process);
    }

    // Close handle
    curl_close($process);
    return $id_ushahidi.' '.$mensaje;
    }
}