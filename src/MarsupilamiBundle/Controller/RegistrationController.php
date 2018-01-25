<?php

namespace MarsupilamiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request as Request;
use Symfony\Component\HttpFoundation\JsonResponse as JsonResponse;

class RegistrationController extends BaseController
{
     public function registerAction()
        {
  
            $request = Request::createFromGlobals();

            $form = $this->container->get('fos_user.registration.form');
            /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
            $userManager = $this->container->get('fos_user.user_manager');

            $user = $userManager->createUser();
            $form->setData($user);

            $form->handleRequest($request);

            if ($form->isValid()) {             
                $user->setEnabled(true);
                $user->addRole('ROLE_ADMIN');
                $userManager->updateUser($user);

                $response = ['valid' => true];
                return new JsonResponse($response);
            } else {
                $string = (string) $form->getErrors(true, false);
                //Show errors
                $response = ['valid' => false];
                return new JsonResponse($response);

            }
           return $this->container->get('templating')->renderResponse('index.html.twig');
        }

}