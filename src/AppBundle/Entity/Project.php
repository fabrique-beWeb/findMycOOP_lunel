<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectRepository")
 */
class Project implements JsonSerializable
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
     * @ORM\ManyToOne(targetEntity="SousTheme")
     * @ORM\JoinColumn(name="fk_sousTheme", referencedColumnName="id")
     */
    private $fksousTheme;   
    
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="fk_userBoss", referencedColumnName="id")
     */
    private $fkuserBoss;  
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="fk_userColab", referencedColumnName="id")
     */
    private $fkuserColab;    

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;


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
     * Set title
     *
     * @param string $title
     *
     * @return Project
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
     * Set text
     *
     * @param string $text
     *
     * @return Project
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

    public function jsonSerialize() {
        return array(
          "id" => $this->id,  
          "sousTheme" => $this->fksousTheme,  
          "userBoss" => $this->fkuserBoss,  
          "userColab" => $this->fkuserColab,  
          "title" => $this->title,  
          "text" => $this->text,  
        );
    }

}

