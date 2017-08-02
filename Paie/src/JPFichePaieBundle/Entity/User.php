<?php

namespace JPFichePaieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="JPFichePaieBundle\Repository\UserRepository")
 */
class User extends BaseUser 
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

/**
   * @ORM\OneToOne(targetEntity="JPFichePaieBundle\Entity\InfoUser", cascade={"persist"})
   */

  protected $infouser;


    /**
     * Set infouser
     *
     * @param \JPFichePaieBundle\Entity\InfoUser $infouser
     *
     * @return User
     */
    public function setInfouser(\JPFichePaieBundle\Entity\InfoUser $infouser = null)
    {
        $this->infouser = $infouser;

        return $this;
    }

    /**
     * Get infouser
     *
     * @return \JPFichePaieBundle\Entity\InfoUser
     */
    public function getInfouser()
    {
        return $this->infouser;
    }


   
}
