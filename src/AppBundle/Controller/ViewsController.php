<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ViewsController extends Controller {

    /**
     * @Route("/", name="home")
     */
    public function getHome() {
        $home = $this->getDoctrine()->getRepository('AppBundle:Post')->findById(1);
        $activities = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        return $this->render(':site:home.html.twig', array('description' => $home, 'activities' => $activities));
    }

    /**
     * @Route("/projets", name="projets")
     */
    public function getProjetsPage() {
        $activities = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        return $this->render(':site:projets.html.twig', array('activities' => $activities));
    }

    /**
     * @Route("/details", name="detailsProjet")
     */
    public function getDetailsPage() {
        return $this->render(':membres:detailsProjet.html.twig');
    }

    /**
     * @Route("/membres", name="membres")
     */
    public function getMembresPage() {
        $activities = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        $membres = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
        return $this->render(':site:membres.html.twig', array(
                    'activities' => $activities,
                    'membres' => $membres,
        ));
    }

    /**
     * @Route("/bar", name="bar")
     */
    public function getBar() {
        $activities = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        $themes = $this->getDoctrine()->getRepository('AppBundle:Theme')->findAll();
        $posts = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        return $this->render(':site:bar.html.twig', array(
                    'activities' => $activities,
                    'themes' => $themes,
                    'posts' => $posts
        ));
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function getContactPage() {
        return $this->render(':site:contact.html.twig');
    }

    /**
     * @Route("/carnet", name="carnetdebord")
     */
    public function getCarnetDeBordPage() {
        $activities = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
        $mails = $this->getDoctrine()->getRepository('AppBundle:Mail')->findAll();
        $posts = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        return $this->render(':membres:carnetDeBord.html.twig', array(
                    'activities' => $activities,
                    'users' => $users,
                    'mails' => $mails,
                    'posts' => $posts
        ));
    }

    /**
     * @Route("/forum/{id}", name="forum")
     */
    public function getForum($id) {
        $activities = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        return $this->render(':site:forum.html.twig', array('activities' => $activities));
    }

    /**
     * @Route("/login", name="login")
     */
    public function getLogin() {
        return $this->render(':site:login.html.twig');
    }

}
