<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
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

    /**
     * @Route("/carnet/{id}",name ="editprofil")
     */
    public function editProfil(Request $request, User $user) {
//        $deleteForm = $this->createDeleteForm($candidat);
        $editForm = $this->createForm(UserType::class, $user);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
//            return $this->redirectToRoute('profil.html.twig');
        }
        return $this->render(':membres:editProfil.html.twig', array(
                    'user' => $user,
                    'edit_form' => $editForm->createView(),
        ));
    }

}
