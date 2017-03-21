<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of AjaxController
 *
 * @author seb-web
 */
class AjaxController extends Controller {

    /**
     * @Route("/envoieMail", name="envoieMail")
     */
    public function getEnvoieMail(Request $r) {
        
        $reponseJson = new JsonResponse();
        return $reponseJson->setData($result);
//        return $this->redirectToRoute('home');
    }

}
