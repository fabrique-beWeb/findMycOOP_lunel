<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Theme;
use AppBundle\Form\ThemeType;
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
     * @Route("/theme", name="theme")
     */
    public function getAddTheme() {
//        $em = $this->getDoctrine()->getManager();
        $formTheme = $this->createForm(ThemeType::class);
        $activities = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        return $this->render(':membres:addTheme.html.twig', array('activities' => $activities, 'formTheme' => $formTheme->createView()));
    }

    /**
     * @Route("/themeValid", name="addTheme")
     */
    public function getValidTheme(Request $r) {
        $t = new Theme();
        $formTheme = $this->createForm(ThemeType::class, $t);
        $activities = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        if ($r->getMethod() == 'POST') {
            $formTheme->handleRequest($r);
            $em = $this->getDoctrine()->getManager();
            $em->persist($t);
            $em->flush();
            $themes = $this->getDoctrine()->getRepository('AppBundle:Theme')->findAll();
            return $this->render(':site:bar.html.twig', array(
                        'activities' => $activities,
                        'themes' => $themes
            ));
        }
        return $this->render(':membres:addTheme.html.twig', array('activities' => $activities, 'formTheme' => $formTheme->createView()));
    }

    /**
     * @Route("/themeValid/{id}", name="validTheme")
     */
    public function getEditTheme(Request $r, $id) {
        $em = $this->getDoctrine()->getManager();
        $t = $em->find('AppBundle:Theme', $id);
        $activities = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        $formTheme = $this->createForm(ThemeType::class, $t);
        if ($r->getMethod() == 'POST') {
            $formTheme->handleRequest($r);
            $em = $this->getDoctrine()->getManager();
            $em->persist($t);
            $em->flush();
            $themes = $this->getDoctrine()->getRepository('AppBundle:Theme')->findAll();
            return $this->render(':site:bar.html.twig', array(
                        'activities' => $activities,
                        'themes' => $themes
            ));
        }
        return $this->render(':membres:addTheme.html.twig', array(
                    'activities' => $activities,
                    'id' => $id,
                    'formTheme' => $formTheme->createView()
        ));
    }

    /**
     * @Route("/User", name="user")
     */
    public function getAddUser() {
        $formUser = $this->createForm(UserType::class);
        return $this->render(':membres:addUser.html.twig', array('formUser' => $formUser->createView()));
    }

    /**
     * @Route("/userValid", name="vaildUser")
     */
    public function getValidUser(Request $r) {
        $u = new User();
        $formUser = $this->createForm(UserType::class, $u);
        if ($r->getMethod() == 'POST') {
            $formUser->handleRequest($r);
            $em = $this->getDoctrine()->getManager();
            $em->persist($u);
            $em->flush();
            return $this->redirectToRoute(':site:login.html.twig');
        }
        return $this->redirectToRoute(':membres:addUser.html.twig', array('formUser' => $formUser->createView()));
    }

}
