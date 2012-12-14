<?php

namespace Orion7\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 */
class IncidenteRepository extends EntityRepository
{
	public function findByCentro($codCentro)
    {
        $qb = $this->createQueryBuilder('i')
                   ->select('i')
                   ->where('i.centro = :centro')
                   ->setParameter('centro', $codCentro);

        return $qb->getQuery()
                  ->getResult();
    }

    public function approveUshahidiReport($idIncidente)
    {
    	// Buscar incidente
    	// Determinar si se quiere respuesta
    	$qb = $this->createQueryBuilder('i')
                   ->select('i')
                   ->where('i.id = :incidente')
                   ->setParameter('id', $idIncidente);

        $query = $qb->getQuery()
                   ->getResult();

        // $id_ushahidi = $query->getIdUshahidi; Revisar

        $process = curl_init();
		// set url para hacer el request
		// Preparar array con datos a postear
		// array with the field name as key and field data as value
		$data = array(
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
		curl_setopt($process, CURLOPT_POSTFIELDS, $data);
		// capacidad para tener una respuesta de la solicitud hecha
		curl_setopt($process, CURLOPT_RETURNTRANSFER,TRUE);
		// ejecutar la llamada curl
		$ret_val = curl_exec($process);

		// Check if any error occured
		if(!curl_errno($process))
		{
			$exito = 1;
			//echo "Procesado con éxito";
			//$info = curl_getinfo($process);
			//echo 'Took ' . $info['total_time'] . ' seconds to send a request to ' . $info['url'].'<br>';
			//echo $info['CURLINFO_HTTP_CODE'];
			//echo curl_multi_getcontent($process);
		}

		// Close handle
		curl_close($process);
    }

    public function listAllByIds($ids)
    {
      if (count($ids)==0) return array();

      $qb = $this->createQueryBuilder('i');
      $qb->select('i');
      $qb->where($qb->expr()->in('i.id', $ids ));

      return $qb->getQuery()
                ->getResult();
    }
}