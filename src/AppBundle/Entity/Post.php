<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 */
class Post implements JsonSerializable
{
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
     *
     * @ORM\ManyToOne(targetEntity="Topic")
     * @ORM\JoinColumn(name="fk_topic", referencedColumnName="id")
     */
    private $fktopic;
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="fk_user", referencedColumnName="id")
     */
    private $fkuser;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Task")
     * @ORM\JoinColumn(name="fk_task", referencedColumnName="id")
     */
    private $fktask;
    
    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Post
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set datetime
     *
     * @param DateTime $datetime
     *
     * @return Post
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    public function jsonSerialize() {
        return array (
            "id"=> $this->id,
            "fktopic"=> $this->fktopic,
            "user"=> $this->fkuser,
            "task"=> $this->fktask,
            "title"=> $this->title,
            "text"=> $this->text,
            "datetime"=> $this->datetime
        );
        
    }

}

