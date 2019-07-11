<?php

namespace ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="ShopBundle\Repository\UserRepository")
 */
class User implements UserInterface
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
     * @ORM\Column(name="userName", type="string", length=180)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=500)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, unique=true)
     */
    private $email;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="premium", type="boolean")
     */
    private $premium;

    /**
     * @var string
     *
     * @ORM\Column(name="nameComplete", type="string", length=180)
     */
    private $nameComplete;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    public function __construct()
    {
        $this->isActive = true;
    }

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
     * Set userName
     *
     * @param string $userName
     *
     * @return User
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->premium,
            $this->nameComplete,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->premium,
            $this->nameComplete,
        ) = unserialize($serialized);
    }

    public function getSalt()
    {
    
        return null;
    }

    
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
    * @Route string $email
     *
     *@return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

   
    public function getEmail()
    {
        return $this->email;
    }

    
    public function setPremium($premium)
    {
        $this->premium = $premium;

        return $this;
    }

    
    public function getPremium()
    {
        return $this->premium;
    }

    /**
     * Set nameComplete
     *
     * @param string $nameComplete
     *
     * @return User
     */
    public function setNameComplete($nameComplete)
    {
        $this->nameComplete = $nameComplete;

        return $this;
    }

    public function getNameComplete()
    {
        return $this->nameComplete;
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }

   
}
    