<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable {
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=255, nullable=true, unique=true)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="passWord", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true, unique=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, nullable=true, unique=true)
     */
    private $mail;

    /**
     * @var int
     *
     * @ORM\Column(name="postalCode", type="integer", nullable=true)
     */
    private $postalCode;

    /**
     * @var array
     *
     * @ORM\Column(name="posts", type="array", nullable=true)
     */
    private $posts;

    /**
     * @var array
     *
     * @ORM\Column(name="boss", type="array", nullable=true)
     */
    private $boss;

    /**
     * @var array
     *
     * @ORM\Column(name="role", type="array")
     */
    private $role;

    function getRole() {
        return $this->role;
    }

    function setRole($role) {
        $this->role = $role;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     *
     * @return User
     */
    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string
     */
    public function getPseudo() {
        return $this->pseudo;
    }

    /**
     * Set passWord
     *
     * @param string $passWord
     *
     * @return User
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get passWord
     *
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return User
     */
    public function setAddress($address) {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return User
     */
    public function setCity($city) {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return User
     */
    public function setUrl($url) {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return User
     */
    public function setMail($mail) {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail() {
        return $this->mail;
    }

    /**
     * Set postalCode
     *
     * @param integer $postalCode
     *
     * @return User
     */
    public function setPostalCode($postalCode) {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return int
     */
    public function getPostalCode() {
        return $this->postalCode;
    }

    /**
     * Set posts
     *
     * @param array $posts
     *
     * @return User
     */
    public function setPosts($posts) {
        $this->posts = $posts;

        return $this;
    }

    /**
     * Get posts
     *
     * @return array
     */
    public function getPosts() {
        return $this->posts;
    }

    /**
     * Set boss
     *
     * @param array $boss
     *
     * @return User
     */
    public function setBoss($boss) {
        $this->boss = $boss;

        return $this;
    }

    /**
     * Get boss
     *
     * @return array
     */
    public function getBoss() {
        return $this->boss;
    }

    public function eraseCredentials() {
        
    }

    public function getRoles() {
        return $this->role;
    }

    public function getSalt() {
//        return $this->mail;
    }


    public function getUsername(){
        return $this->pseudo;
    }

    public function serialize(){
        return serialize(array(
            $this->id,
            $this->name,
            $this->password,
        ));
    }

    public function unserialize($serialized){
        list(
                $this->id,
                $this->name,
                $this->password,
                ) = unserialize($serialized);
    }
    
}

