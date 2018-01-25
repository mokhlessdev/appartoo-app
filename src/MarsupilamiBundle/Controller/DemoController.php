<?php

// src/Acme/ApiBundle/Controller/DemoController.php

namespace MarsupilamiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class DemoController extends FOSRestController
{
    public function getDemosAction()
    {
        $data = array("hello" => "world");
        $view = $this->view($data);
/*
       $user = $this->get('security.context')->getToken()->getUser();
  if ($this->get('security.context')->isGranted('ROLE_JCVD') === FALSE) {
            throw new AccessDeniedException();
        }
        */
        return $this->handleView($view);
    }




}