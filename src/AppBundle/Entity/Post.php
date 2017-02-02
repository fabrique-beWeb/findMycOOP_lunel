<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * Post
 *
 * @ORM\Table(name="fmc_post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 */
class Post {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ManyToOne(targetEntity="Theme")
     * @JoinColumn(name="fk_theme", referencedColumnName="id")
     */
    private $theme;

    /**
     * @var string
     * @ManyToOne(targetEntity="Post")
     * @JoinColumn(name="fk_post", referencedColumnName="id")
     */
    private $post;

    /**
     * @var string
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="fk_user", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="datetime", type="string", length=20)
     */
    private $datetime;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set theme
     *
     * @param string $theme
     *
     * @return Post
     */
    public function setTheme($theme) {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string
     */
    public function getTheme() {
        return $this->theme;
    }

    /**
     * Set post
     *
     * @param string $post
     *
     * @return Post
     */
    public function setPost($post) {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return string
     */
    public function getPost() {
        return $this->post;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return Post
     */
    public function setUser($user) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser() {
        return $this->user;
    }

    function getTitle() {
        return $this->title;
    }

    function getDescription() {
        return $this->description;
    }

    function getUrl() {
        return $this->url;
    }

    function getDatetime() {
        return $this->datetime;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function setDatetime($datetime) {
        $this->datetime = $datetime;
    }

}
