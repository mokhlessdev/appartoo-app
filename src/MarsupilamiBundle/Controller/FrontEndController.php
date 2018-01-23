<?php

namespace MarsupilamiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontEndController extends Controller {

    public function indexAction() {
        return $this->render('index.html.twig');
    }

}
