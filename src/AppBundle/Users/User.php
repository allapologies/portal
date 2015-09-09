<?php

namespace AppBundle\Users\User;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Users
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    protected $login;

    /**
     * @ORM\Column(type="string", length=30)
     */
    protected $email;
    /**
     * @ORM\Column(type="text", length=30)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=6)
     */
    protected $gender;

    /**
     * @ORM\Column(type="text")
     */
    protected $password;
}