<?php

namespace Orion7\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Orion7\CoreBundle\Entity\Denuncia;
use Orion7\CoreBundle\Form\DenunciaType;

use Orion7\CoreBundle\Entity\Incidente;
use Orion7\CoreBundle\Entity\Subcategoria;
use Orion7\CoreBundle\Entity\Responsable;

use JMS\SecurityExtraBundle\Security\Authorization\Expression\Expression;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;

class DenunciaController extends Controller
{
    public function indexAction()
    {
        return $this->render('Orion7CoreBundle:Denuncia:index.html.twig', array(
            'denuncias' => array()
        ));
    }

    public function newAction()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_USER'))
        {
            throw new AccessDeniedException();
        }
    	$denuncia = new Denuncia();
        $form = $this->createForm(new DenunciaType(), $denuncia);

        return $this->render('Orion7CoreBundle:Denuncia:new.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
    //Candidato a refactor
    public function createAction()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_USER'))
        {
            throw new AccessDeniedException();
        }

        $denuncia = new Denuncia();

        $request = $this->getRequest();
        $form    = $this->createForm(new DenunciaType(), $denuncia);
        $form->bindRequest($request);
        $denunciatype = $request->request->get('denunciatype');
       
        $em = $this->getDoctrine()
                   ->getEntityManager();
        
        $user = $this->getUser();
        $denuncia -> setUsuarioRegistro($user);

        //$subcategoriasIds = explode(',', $denunciatype['categoria']);
        $subcategoriasIds = $denunciatype['categoria'];
        $subcategorias = $em->getRepository('Orion7CoreBundle:Subcategoria')
                 ->listAllByIds($subcategoriasIds);

        foreach ($subcategorias as $subcategoria) {
            $denuncia -> addSubcategoria($subcategoria);
        }

        $incidenteId = $denunciatype['incidente_existente'];
        if ($incidenteId) {
            $incidente = $this -> getIncidente($incidenteId);
        }
        else {//Caso id = 0, indicando que se quiere un incidente nuevo
            $estadoId = $denunciatype['estado'];
            $parroquiaId = $denunciatype['parroquia'];
            $municipioId = $denunciatype['municipio'];
            $centroId = $denunciatype['centro'];  

            $incidente = $this -> newIncidente($estadoId, $municipioId, $parroquiaId, $centroId);
            $em->persist($incidente);
        }
        $denuncia -> setIncidente($incidente);
        //$this->get('session')->getFlashBag()->add('notice', 'adentro, subcategorias ' . serialize($denuncia));
        $em->persist($denuncia);
        $em->flush();

        foreach ($subcategorias as $subcategoria) {
            $this->insertSubcategoriaDenuncia($subcategoria->getId(), $denuncia->getId());
        }
        foreach ($denuncia->getResponsables() as $responsable) {
            $this->insertResponsablesDenuncia($responsable->getId(), $denuncia->getId());
        }

        return $this->redirect($this->generateUrl('Orion7CoreBundle_denuncia_new'));
    }

    protected function getIncidente($incidenteId)
    {
        $em = $this->getDoctrine()
                   ->getEntityManager();

        $incidente = $em->getRepository('Orion7CoreBundle:Incidente')
                    ->find($incidenteId);

        if (!$incidente) {
            throw $this->createNotFoundException('No se puede conseguir el incidente especificado');
        }

        return $incidente;
    }

    protected function newIncidente($estadoId, $municipioId, $parroquiaId, $centroId)
    {
         $em = $this->getDoctrine()
                   ->getEntityManager();

        $incidente = new Incidente();

        $estado = $em->getRepository('Orion7CoreBundle:Estado')
                    ->find($estadoId);
        $incidente -> setEstado($estado);

        $municipio = $em->getRepository('Orion7CoreBundle:Municipio')
                    ->find($municipioId);
        $incidente -> setMunicipio($municipio);

        $parroquia = $em->getRepository('Orion7CoreBundle:Parroquia')
                    ->find($parroquiaId);
        $incidente -> setParroquia($parroquia);

        $centro = $em->getRepository('Orion7CoreBundle:Centro')
                    ->find($centroId);
        $incidente -> setCentro($centro);

        return $incidente;
    }

    public function listNewByRoleAction($isFiltrado)
    {
        if (false === $this->get('security.context')->isGranted('ROLE_FILTRO'))
        {
            throw new AccessDeniedException();
        }

        if ($this->get('security.context')->isGranted('ROLE_FILTRO1')) 
        {
            $terminales[] = 0;
            $terminales[] = 9;
        }

        if ($this->get('security.context')->isGranted('ROLE_FILTRO2')) 
        {
            $terminales[] = 1;
            $terminales[] = 8;
        }

        if ($this->get('security.context')->isGranted('ROLE_FILTRO3')) 
        {
            $terminales[] = 2;
            $terminales[] = 7;
        }

        if ($this->get('security.context')->isGranted('ROLE_FILTRO4')) 
        {
            $terminales[] = 3;
            $terminales[] = 6;
        }
        if ($this->get('security.context')->isGranted('ROLE_FILTRO5')) 
        {
            $terminales[] = 4;
            $terminales[] = 5;
        }

        $em = $this->getDoctrine()
                    ->getEntityManager();

        $incidentesCentrosAsignados = $this->getIncidentesTerminalesCodcentro($terminales);

        //$this->get('session')->getFlashBag()->add('notice', '' . var_export($incidentesCentrosAsignados));

        $denuncias = $em->getRepository('Orion7CoreBundle:Denuncia')
                     ->findByIncidentesAsignados($incidentesCentrosAsignados);

        return $this->render('Orion7CoreBundle:Denuncia:index.html.twig', array(
            'denuncias' => $denuncias,
            'filtrado' => $isFiltrado
        ));
    }

    //refactor candidate
    protected function getIncidentesTerminalesCodcentro($terminales)
    {
        $sql = "SELECT i.id FROM incidente i ";
        $sql = $sql . "WHERE RIGHT(i.centro,1) = $terminales[0]";

        for ($i=1; $i < count($terminales); $i++) { 
            $sql .= " OR RIGHT(i.centro,1) = $terminales[$i]";
        }

        $conn = $this->get('database_connection');
        $statement = $conn->prepare($sql);
        $statement->execute();
        $arr = $statement->fetchAll();
        return $this->getFlatArray($arr);
    }

    //refactor candidate
    protected function insertSubcategoriaDenuncia($subcategoriaId, $denunciaId)
    {
        $sql = "INSERT into subcategorias_denuncias (subcategoria,denuncia) values (?,?) ";

        $conn = $this->get('database_connection');
        
        return $conn->executeUpdate($sql, array($subcategoriaId, $denunciaId));
    }

    protected function insertResponsablesDenuncia($responsableId, $denunciaId)
    {
        $sql = "INSERT into responsables_denuncias (responsable,denuncia) values (?,?) ";

        $conn = $this->get('database_connection');
    
        return $conn->executeUpdate($sql, array($responsableId, $denunciaId));
    }

    protected function eliminarSubcategoriasResponsablesDenuncia($denunciaId)
    {
        $sql1 = "DELETE FROM subcategorias_denuncias WHERE denuncia = ?";
        $sql2 = "DELETE FROM responsables_denuncias WHERE denuncia = ?";
        $conn = $this->get('database_connection');
        $cuenta1 = $conn->executeUpdate($sql1, array($denunciaId));
        $cuenta2 = $conn->executeUpdate($sql2, array($denunciaId)); 

        return $cuenta1 + $cuenta2;
    }


    //refactor candidate para evitar duplicidad con CanalizacionController
    protected function getFlatArray($array)
    {
        $ret_array = array();
        foreach(new \RecursiveIteratorIterator(new \RecursiveArrayIterator($array)) as $value)
        {
            $ret_array[] = $value;
        }
        return $ret_array;
    }

    public function ushahidiLabAction($denunciaid)
    {
        $em = $this->getDoctrine()
                    ->getEntityManager();
         $denuncia = $em->getRepository('Orion7CoreBundle:Denuncia')
                    ->find($denunciaid);
        $k = 1;
            $subcategorias = "";
            foreach($denuncia->getSubcategorias() as $oSubcategoria):
                if($k!=1){
                    $subcategorias.= ',';
                }
                $subcategorias.= $oSubcategoria->getId();
                $k++;
            endforeach;
 
            $via_i = $denuncia->getVia()->getId();
            if($via_i==1){
                $via = ',56';
            }
            elseif($via_i==2){
                $via = ',57';
            }
            elseif($via_i==3){
                $via = ',58';
            }
 
           $data = array(
              'task' => 'report', 
              'incident_title' => 'Denuncia '.$denuncia->getId(), 
              'incident_description' => $denuncia->getRelato(), 
              'incident_date' => date('m/d/Y'),
              'incident_hour' => $denuncia->getHoraHecho()->format('g'),
              'incident_minute' => $denuncia->getHoraHecho()->format('i'), 
              'incident_ampm' => $denuncia->getHoraHecho()->format('a'), 
              'incident_category' => $subcategorias.$via,
              'latitude' => $denuncia->getIncidente()->getCentro()->getLatitud(), 
              'longitude' => $denuncia->getIncidente()->getCentro()->getLongitud(),  
              'location_name' => 'Estado: '.$denuncia->getIncidente()->getEstado()->getNombre().' Municipio: '.$denuncia->getIncidente()->getMunicipio()->getNombre().' Parroquia: '.$denuncia->getIncidente()->getParroquia()->getNombre().' Centro de Votación: '.$denuncia->getIncidente()->getCentro()->getNombre(),
            );
 
              
        //return $data;
    $process = curl_init('http://votojoven.com/den16do7/api?task=report');
    //curl_setopt($process, CURLOPT_URL,'http://votojoven.com/den16do7/api?task=report');
    //curl_setopt($process, CURLOPT_TIMEOUT, 30);
    // permitir envio de informacion por POST
    curl_setopt($process, CURLOPT_POST, TRUE); 
    // colocar campos a ser posteados
    curl_setopt($process, CURLOPT_POSTFIELDS, $data);
    // capacidad para tener una respuesta de la solicitud hecha
    curl_setopt($process, CURLOPT_RETURNTRANSFER,TRUE);
    // ejecutar la llamada curl
    $ret_val = curl_exec($process);
    // Check if any error occured
    //if(!curl_errno($process))
    //{
      $respuesta_json = json_decode(curl_multi_getcontent($process),true);
      //$id_ushahidi = $respuesta_json['details']['id']; 
      //Id del reporte ushahidi, meter en campo correspondiente en incidente
    //}
 
    // Close handle
    curl_close($process);
 
    // $hola = $respuesta_json;
 
             // $denuncia ->setIdUshahidi($envio);
             // $em->flush();
        $html = '<pre>'.print_r($respuesta_json).'</pre>';
        return new Response($html);
    }

    public function filtroDenunciaAction($denunciaId)
    {
        $em = $this->getDoctrine()
                    ->getEntityManager();
         $denuncia = $em->getRepository('Orion7CoreBundle:Denuncia')
                    ->find($denunciaId);

        // $incidentes = $em->getRepository('Orion7CoreBundle:Incidente')
        //             ->find($denunciaId);

        $form = $this->createForm(new DenunciaType(), $denuncia);

        return $this->render('Orion7CoreBundle:Denuncia:filtro.html.twig', array(
            'form' => $form->createView(),
            'denuncia' => $denuncia
        ));
    }

    //candidato a ser refactored
    public function denunciaUpdateAction($denunciaId)
    {
        if (false === $this->get('security.context')->isGranted('ROLE_FILTRO'))
        {
            throw new AccessDeniedException();
        }
        $em = $this->getDoctrine()
                   ->getEntityManager();


        $denuncia = $em->getRepository('Orion7CoreBundle:Denuncia')
                 ->find($denunciaId);

        $request = $this->getRequest();
        $form    = $this->createForm(new DenunciaType(), $denuncia);
        $form->bindRequest($request);
        $denunciatype = $request->request->get('denunciatype');
        
        $user = $this->getUser();
        $denuncia -> setUsuarioFiltrado($user);

        $subcategoriasIds = $denunciatype['categoria'];
        $subcategorias = $em->getRepository('Orion7CoreBundle:Subcategoria')
                 ->listAllByIds($subcategoriasIds);

        foreach ($subcategorias as $subcategoria) {
            $denuncia -> addSubcategoria($subcategoria);
        }

        $incidenteId = $denunciatype['incidente_existente'];

        if ($incidenteId) {
            $incidente = $this -> getIncidente($incidenteId);
        }
        else {//Caso id = 0, indicando que se quiere un incidente nuevo
            $estadoId = $denunciatype['estado'];
            $parroquiaId = $denunciatype['parroquia'];
            $municipioId = $denunciatype['municipio'];
            $centroId = $denunciatype['centro'];  

            $incidente = $this -> newIncidente($estadoId, $municipioId, $parroquiaId, $centroId);
            $em->persist($incidente);
        }

        $incidenteIdViejo = $denuncia->getIncidente()->getId();
        if ($incidenteId != $incidenteIdViejo) {
            $incidenteViejo = $this->getIncidente($incidenteIdViejo);
            if (count($incidenteViejo->getDenuncias()) == 1)
            {
                $em->remove($incidenteViejo);
            }
        }

        $denuncia -> setIncidente($incidente);
        $denuncia -> setIsFiltrado(true);

        $em->flush();

        $this->eliminarSubcategoriasResponsablesDenuncia($denuncia->getId());
        foreach ($subcategorias as $subcategoria) {
            $this->insertSubcategoriaDenuncia($subcategoria->getId(), $denuncia->getId());
        }
        foreach ($denuncia->getResponsables() as $responsable) {
            $this->insertResponsablesDenuncia($responsable->getId(), $denuncia->getId());
        }

        //USHAHIDI
 
        if($denuncia -> getIdUshahidi() == 0){
            $k = 1;
            $subcategorias = "";
            foreach($denuncia->getSubcategorias() as $oSubcategoria):
                if($k!=1){
                    $subcategorias.= ',';
                }
                $subcategorias.= $oSubcategoria->getId();
                $k++;
            endforeach;
 
            $via_i = $denuncia->getVia()->getId();
            if($via_i==1){
                $via = ',56';
            }
            elseif($via_i==2){
                $via = ',57';
            }
            elseif($via_i==3){
                $via = ',58';
            }
 
           $data = array(
              'task' => 'report', 
              'incident_title' => 'Denuncia '.$denuncia->getId(), 
              'incident_description' => $denuncia->getRelato(), 
              'incident_date' => date('m/d/Y'),
              'incident_hour' => $denuncia->getHoraHecho()->format('g'),
              'incident_minute' => $denuncia->getHoraHecho()->format('i'), 
              'incident_ampm' => $denuncia->getHoraHecho()->format('a'), 
              'incident_category' => $subcategorias.$via,
              'latitude' => $denuncia->getIncidente()->getCentro()->getLatitud(), 
              'longitude' => $denuncia->getIncidente()->getCentro()->getLongitud(),  
              'location_name' => 'Estado: '.$denuncia->getIncidente()->getEstado()->getNombre().' Municipio: '.$denuncia->getIncidente()->getMunicipio()->getNombre().' Parroquia: '.$denuncia->getIncidente()->getParroquia()->getNombre().' Centro de Votación: '.$denuncia->getIncidente()->getCentro()->getNombre(),
            );
 
             $envio = $em->getRepository('Orion7CoreBundle:Denuncia')
                         ->sendUshahidiReport($data);
 
             // $denuncia ->setIdUshahidi($envio);
             // $em->flush();
        }
        return $this->redirect($this->generateUrl('Orion7CoreBundle_filtro'));
    }
}