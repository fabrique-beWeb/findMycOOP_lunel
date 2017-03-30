<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Entity\SousTheme;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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
     * @Route("/carnet/profile",name ="editprofil")
     */
    public function editProfil(Request $request) {
//        $deleteForm = $this->createDeleteForm($candidat);
//        $editForm = $this->createForm(UserType::class, $user);
        $em = $this->getDoctrine()->getManager()->getRepository(User::class)->find($request->getUser());
        $em->setName($request->get("nom"));
        $em->setFirstName($request->get("prenom"));
        $em->setPseudo($request->get("pseudo"));
        $em->setPassword($request->get("password"));
        $em->setAddress($request->get("adresse"));
        $em->setCity($request->get("ville"));
        $em->setUrl($request->get("url"));
        $em->setMail($request->get("mail"));
        $em->setPostalCode($request->get("codePostal"));
        $em->merge();
        $em->flush();
        return new Response ("ok");
    }

    /**
     * @Route("/add/project/{id}")
     * @Method({"POST"})
     * @param Request $r
     */
    public function addProject(Request $r, $id) {
        $project = new Project();
        $doctrine = $this->getDoctrine();
        $project->setSousTheme($doctrine->getRepository(SousTheme::class)->find($id));
        $project->setTitle($doctrine->getRepository(State::class)->find($r->get("state")));
        $project->setStatus($doctrine->getRepository(Status::class)->find($r->get("status")));
        $project->setPrice($r->get("price"));
        $em = $doctrine->getManager();
        $em->persist($project);
        $em->flush();
        return new JsonResponse($project);
    }

    /**
     * @Route("/get/session", name="getSession")
     * @Method({"GET"})
     */
    public function getSessionId(){
        $user = $this->getUser();
$userId = $user->getId();
        return new JsonResponse($userId);
    }
    
}
