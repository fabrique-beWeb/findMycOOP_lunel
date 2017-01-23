<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ViewsController extends Controller {

    /**
     * @Route("/", name="home")
     */
    public function getLandingPage() {
        return $this->render(':site:home.html.twig');
    }

    /**
     * @Route("/projets", name="projets")
     */

    public function getProjetsPage() {
        return $this->render(':site:projets.html.twig');
    }
    /**
     * @Route("/details", name="details")
     */

    public function getDetailsPage() {
        return $this->render(':membres:detailsProjet.html.twig');
    }

    /**
     * @Route("/membres", name="membres")
     */

    public function getMembresPage() {
         return $this->render(':site:membres.html.twig');
    }

    /**
     * @Route("/bar", name="bar")
     */

    public function getBar() {
         return $this->render(':site:bar.html.twig');
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
         return $this->render(':membres:carnetDeBord.html.twig');
    }
    /**
     * @Route("/login", name="login")
     */

    public function getLogin() {
         return $this->render(':site:login.html.twig');
    }
    /**
     * @Route("/forum", name="forum")
     */

    public function getForum() {
         return $this->render(':site:forum.html.twig');
    }

}
