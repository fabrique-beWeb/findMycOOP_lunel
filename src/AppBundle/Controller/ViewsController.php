<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Entity\Project;
use AppBundle\Entity\SousTheme;
use AppBundle\Entity\Task;
use AppBundle\Entity\Theme;
use AppBundle\Entity\Topic;
use AppBundle\Form\MailType;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ViewsController extends Controller {

    /**
     * @Route("/", name="home")
     */
    public function getHome() {
        $home = $this->getDoctrine()->getRepository('AppBundle:Post')->findById(1);
        $activities = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        return $this->render(':site:home.html.twig', array('description' => $home, 'activities' => $activities));
//        return $this->render(':site:home.html.twig');
    }

    /**
     * @Route("/projets", name="projets")
     */
    public function getProjetPage() {
        return $this->render(':site:projets.html.twig');
//        return $this->render(':site:home.html.twig');
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
//        $activities = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        $membres = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
        return $this->render(':site:membres.html.twig', array(
                    'membres' => $membres,
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
        $formContact = $this->createForm(MailType::class)->createView();
        $subjects = $this->getDoctrine()->getRepository('AppBundle:Subject')->findAll();
        return $this->render(':site:contact.html.twig', array('formMail' => $formContact, 'sujets' => $subjects));
    }

    /**
     * @Route("/carnet", name="carnetdebord")
     */
    public function getCarnetDeBordPage() {
//        $activities = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        $em = $this->getDoctrine()->getManager();
        $u = $em->find('AppBundle:User', $this->getUser());
        $formUser = $this->createForm(UserType::class, $u);
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
        $mails = $this->getDoctrine()->getRepository('AppBundle:Mail')->findByReceiver($this->getUser());
        $user = $this->getUser();
        $userId = $user->getId();
//        $posts = $this->getDoctrine()->getRepository('AppBundle:Post')->findByUser($this->getUser());
        return $this->render(':membres:carnetDeBord.html.twig', array(
//                    'activities' => $activities,
                    'id' => $userId,
                    'users' => $users,
                    'mails' => $mails,
                    'formUser' => $formUser
        ));
    }

    /**
     * @Route("/login", name="login")
     */
    public function getLogin() {
        return $this->render(':site:login.html.twig');
    }

    /**
     * @Route("/themes", name="themes")
     * @Method({"GET"})
     */
    public function getThemes() {
        $themes = $this->getDoctrine()->getRepository(Theme::class)->findAll();
        return new JsonResponse($themes);
    }

    /**
     * @Route("/sousTheme", name="sousTheme")
     * @Method({"GET"})
     */
    public function getSousTheme() {
        $sousTheme = $this->getDoctrine()->getRepository(SousTheme::class)->findAll();
        return new JsonResponse($sousTheme);
    }

    /**
     * @Route("/sousTheme/{id}", name="sousThemeFromTheme")
     * @Method({"GET"})
     */
    public function getSousThemeFromTheme($id) {
        $sousTheme = $this->getDoctrine()->getRepository(SousTheme::class)->findByFktheme($id);
        return new JsonResponse($sousTheme);
    }

    /**
     * @Route("/projects", name="projects")
     * @Method({"GET"})
     */
    public function getProjects() {
        $projects = $this->getDoctrine()->getRepository(Project::class)->findAll();
        return new JsonResponse($projects);
    }

    /**
     * @Route("/projects/{id}", name="projectsFromSousTheme")
     * @Method({"GET"})
     */
    public function getProjectsFromSousTheme($id) {
        $projects = $this->getDoctrine()->getRepository(Project::class)->findByFksousTheme($id);
        return new JsonResponse($projects);
    }

    /**
     * @Route("/topics", name="topics")
     * @Method({"GET"})
     */
    public function getTopics() {
        $topics = $this->getDoctrine()->getRepository(Topic::class)->findAll();
        return new JsonResponse($topics);
    }

    /**
     * @Route("/tasks", name="tasks")
     * @Method({"GET"})
     */
    public function getTasks() {
        $tasks = $this->getDoctrine()->getRepository(Task::class)->findAll();
        return new JsonResponse($tasks);
    }

    /**
     * @Route("/tasks/{id}", name="tasksFromProject")
     * @Method({"GET"})
     */
    public function getTasksFromProject($id) {
        $tasks = $this->getDoctrine()->getRepository(Task::class)->findByFkproject($id);
        return new JsonResponse($tasks);
    }

    /**
     * @Route("/posts", name="posts")
     * @Method({"GET"})
     */
    public function getPosts() {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();
        return new JsonResponse($posts);
    }

    /**
     * @Route("/posts/{id}", name="postsFromTask")
     * @Method({"GET"})
     */
    public function getPostsFromTask($id) {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findByFktask($id);
        return new JsonResponse($posts);
    }
}
