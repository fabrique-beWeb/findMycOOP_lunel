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
     * @Route("/membres", name="membres")
     */

    public function getMembresPage() {
         return $this->render(':site:membres.html.twig');
    }

    /**
     * @Route("/bar", name="bar")
     */

    public function getBar() {
         return $this->render(':site:bars.html.twig');
    }

}
