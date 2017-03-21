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
     * @Route("/Membres/theme", name="theme")
     */
    public function getAddTheme() {
//        $em = $this->getDoctrine()->getManager();
        $formTheme = $this->createForm(ThemeType::class);
        $activities = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        return $this->render(':membres:addTheme.html.twig', array('activities' => $activities, 'formTheme' => $formTheme->createView()));
    }

    /**
     * @Route("/Membres/themeValid", name="addTheme")
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
     * @Route("/Membres/themeValid/{id}", name="validTheme")
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
     * @Route("/Post", name="post")
     */
    public function getAddPost() {
        $formPost = $this->createForm(PostType::class);
        return $this->render(':membres:addPost.html.twig', array('formPost' => $formPost->createView()));
    }

    /**
     * @Route("/postVaild", name="postValid")
     */
    public function getValidPost(Request $r) {
        $p = new Post;
        $formPost = $this->createForm(PostType::class, $p);
        if ($r->getMethod() == 'POST') {
            $formPost->handleRequest($r);
            $em = $this->getDoctrine()->getManager();
            $p->setDatetime(time());
            $p->setUser($this->getUser());
            $em->persist($p);
            $em->flush();
            return $this->redirectToRoute('home');
        }
        return $this->redirectToRoute('post', array('formPost' => $formPost->createView()));
    }
}
