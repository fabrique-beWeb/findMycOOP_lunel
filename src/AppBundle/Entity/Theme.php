<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * Theme
 *
 * @ORM\Table(name="theme")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ThemeRepository")
 */
class Theme {

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
     * @JoinColumn(name="fk_themeParent", referencedColumnName="id")
     */
    private $themeParent;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set themeParent
     *
     * @param string $themeParent
     *
     * @return Theme
     */
    public function setThemeParent($themeParent) {
        $this->themeParent = $themeParent;

        return $this;
    }

    /**
     * Get themeParent
     *
     * @return string
     */
    public function getThemeParent() {
        return $this->themeParent;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Theme
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }
    public function __toString() {
        return $this->getTitle();
    }

}
