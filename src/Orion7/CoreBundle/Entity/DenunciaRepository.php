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

    public function sendUshahidiComment($idDenuncia)
    {
      // POR HACER:
      // Conseguir el incidente asociado
      // Determinar "nombre" y "desc"
      // Determinar si se coloca el id resultante en la tabla
      // Limpiar función

      $qb = $this->createQueryBuilder('i')
                   ->select('i')
                   ->where('i.id = :incidente')
                   ->setParameter('id', $idIncidente);

        $query = $qb->getQuery()
                   ->getResult();

        // $id_ushahidi = $query->getIdUshahidi; Revisar

      $process = curl_init();
      $data = array(
        'task' => 'comments', 
        'action' => 'add', 
        'incident_id' => idIncidente, 
        'comment_author' => 'Carlos Guerra', 
        'comment_description' => '<h2>Carlos Guerra</h2>Array Carga<br>Siguiente línea'
        );
      curl_setopt($process, CURLOPT_URL,'http://votojoven.com/den16do7/api?task=comments');
      curl_setopt($process, CURLOPT_HEADER, false);
      curl_setopt($process, CURLOPT_USERPWD, 'admin:uLtr4bo0k$12');
      curl_setopt($process, CURLOPT_TIMEOUT, 30);
      curl_setopt($process, CURLOPT_POST, TRUE);
      curl_setopt($process, CURLOPT_POSTFIELDS, $data);
      curl_setopt($process, CURLOPT_RETURNTRANSFER,TRUE);
      $ret_val = curl_exec($process);
      if(!curl_errno($process))
      {
        //$info = curl_getinfo($process);
        $exito = 1;
        //echo 'Took ' . $info['total_time'] . ' seconds to send a request to ' . $info['url'].'<br>';
        //echo $info['CURLINFO_HTTP_CODE'];
        $respuesta_json = json_decode(curl_multi_getcontent($process),true);
        //print_r($respuesta_json);
      }
      curl_close($process);
    }

}