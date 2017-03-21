<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Entity\Theme;
use AppBundle\Entity\User;
use AppBundle\Form\PostType;
use AppBundle\Form\ThemeType;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of CrudUserController
 *
 * @author browne
 */
class CrudUserController extends Controller {

    /**
     * @Route("/register", name="register")
     */
    public function getAddUser() {
        $formUser = $this->createForm(UserType::class);
        return $this->render(':membres:addUser.html.twig', array('formUser' => $formUser->createView()));
    }

    /**
     * @Route("/userValid", name="validUser")
     */
    public function getValidUser(Request $r) {
        $u = new User();
        $formUser = $this->createForm(UserType::class, $u);
        if ($r->getMethod() == 'POST') {
            $formUser->handleRequest($r);
            $em = $this->getDoctrine()->getManager();
            $u->setRole(array("ROLE_MEMBRES"));
            $u->setBoss(array());
            $u->setPosts(array());
            $em->persist($u);
            $em->flush();
            return $this->redirectToRoute('login');
        }
        return $this->redirectToRoute('user', array('formUser' => $formUser->createView()));
    }
}
