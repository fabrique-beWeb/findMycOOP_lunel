<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
        $themes = $this->getDoctrine()->getManager()->getRepository('AppBundle:Theme')->findById(2);
        $theme = $this->getKid($this->sep($themes), array());
        $posts = $this->getDoctrine()->getRepository('AppBundle:Post')->findByTheme($theme);
        return $this->render(':site:projets.html.twig', array(
        'activities' => $activities,
        'themes' => $theme,
        'posts' => $posts
        ));
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
        $themes = $this->getDoctrine()->getManager()->getRepository('AppBundle:Theme')->findById(1);
        $theme = $this->getKid($this->sep($themes), array());
//        $bar = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll(1);
        $posts = $this->getDoctrine()->getRepository('AppBundle:Post')->findByTheme($theme);
        return $this->render(':site:bar.html.twig', array(
                    'activities' => $activities,
                    'themes' => $theme,
                    'posts' => $posts,
        ));
    }

    public function sep($array) {
        foreach ($array as $val) {
            return $val;
        }
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
        $em = $this->getDoctrine()->getManager();
        $u = $em->find('AppBundle:User', $this->getUser());
        $formUser = $this->createForm(UserType::class, $u);
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
        $mails = $this->getDoctrine()->getRepository('AppBundle:Mail')->findByReceiver($this->getUser());
        $posts = $this->getDoctrine()->getRepository('AppBundle:Post')->findByUser($this->getUser());
        return $this->render(':membres:carnetDeBord.html.twig', array(
                    'activities' => $activities,
                    'users' => $users,
                    'mails' => $mails,
                    'posts' => $posts,
                    'formUser' => $formUser
        ));
    }

    /**
     * @Route("/forum/{id}", name="forum")
     */
    public function getForum($id) {
        $activities = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
//        $liste = array();

        return $this->render(':site:forum.html.twig', array(
                    'activities' => $activities,
//            'liste'=>$this->getDoctrine()->getRepository(Post::class)->find($id)->getEnfants()
//                    'liste' => $this->getChild($this->getDoctrine()->getRepository(Post::class)->find($id), array())
                    'liste' => $this->getAllPost($this->getDoctrine()->getRepository(Post::class)->find($id))
//            'liste'=>$liste
        ));
    }

// la fonction get child prend id du post et une liste
    public function getChild($p, $sortie) {
//    $sortie = array();
//      on stocke l'id 
        $children = $p->getEnfants();
//      pour chaque child dans children
        foreach ($children as $child) {
//            on met child dans sortie
            array_push($sortie, $child);
//            si child a des enfants
            if (count($child->getEnfants()) > 0) {
//                alors on rappel la fonction getChild
                $sortie = $this->getChild($child, $sortie);
            }
        }
        return $sortie;
    }

    public function getKid($themes, $sortie) {
//        echo $themes;
//        echo json_encode($themes);
        $children = $themes->getKids();
        foreach ($children as $child) {
            array_push($sortie, $child);
            if (count($child->getKids()) > 0) {
                $sortie = $this->getKid($child, $sortie);
            }
        }
//        }
        return $sortie;
    }

//    cette fonction permet de d'afficher tous les posts du forum
//    elle prend en parametre un post et elle retoune son parent
    public function getAllPost($post) {
        if ($post->getPost() != NULL) {
            $parent = $post->getPost();
            $post = $this->getAllPost($parent);
        } else {
            $post = $this->getChild($post, array());
        }
        return $post;
    }

    /**
     * @Route("/login", name="login")
     */
    public function getLogin() {
        return $this->render(':site:login.html.twig');
    }

}
