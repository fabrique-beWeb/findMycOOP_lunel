<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * Mail
 *
 * @ORM\Table(name="fmc_mail")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MailRepository")
 */
class Mail {

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
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="author", referencedColumnName="id")
     */
    private $author;

    /**
     * @var string
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="receiver", referencedColumnName="id")
     */
    private $receiver;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255, nullable=true)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="post", type="text")
     */
    private $post;

    /**
     * @var string
     * @ManyToOne(targetEntity="Mail")
     * @JoinColumn(name="fk_mail", referencedColumnName="id")
     */
    private $postParent;

    function getPostParent() {
        return $this->postParent;
    }

    function setPostParent($postParent) {
        $this->postParent = $postParent;
    }

    /**
     * @var bool
     *
     * @ORM\Column(name="seen", type="boolean")
     */
    private $seen;

    /**
     * @var string
     *
     * @ORM\Column(name="datetime", type="integer", nullable=true)
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
     * Set author
     *
     * @param string $author
     *
     * @return Mail
     */
    public function setAuthor($author) {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor() {
        return $this->author;
    }

    /**
     * Set receiver
     *
     * @param string $receiver
     *
     * @return Mail
     */
    public function setReceiver($receiver) {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * Get receiver
     *
     * @return string
     */
    public function getReceiver() {
        return $this->receiver;
    }

    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return Mail
     */
    public function setSubject($subject) {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject() {
        return $this->subject;
    }

    /**
     * Set post
     *
     * @param string $post
     *
     * @return Mail
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
     * Set seen
     *
     * @param boolean $seen
     *
     * @return Mail
     */
    public function setSeen($seen) {
        $this->seen = $seen;

        return $this;
    }

    /**
     * Get seen
     *
     * @return bool
     */
    public function getSeen() {
        return $this->seen;
    }

    /**
     * Set datetime
     *
     * @param string $datetime
     *
     * @return Mail
     */
    public function setDatetime($datetime) {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return string
     */
    public function getDatetime() {
        return $this->datetime;
    }
    public function __toString() {
        return $this->getSubject();
    }
}
