<?php

namespace JPFichePaieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compagny
 *
 * @ORM\Table(name="compagny")
 * @ORM\Entity(repositoryClass="JPFichePaieBundle\Repository\CompagnyRepository")
 */
class Compagny
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=255)
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var int
     *
     * @ORM\Column(name="siret", type="integer")
     */
    private $siret;

    /**
     * @var string
     *
     * @ORM\Column(name="urssaf", type="string", length=255)
     */
    private $urssaf;

    /**
     * @var string
     *
     * @ORM\Column(name="naf", type="string", length=255)
     */
    private $naf;

    /**
     * @var int
     *
     * @ORM\Column(name="effectif", type="integer")
     */
    private $effectif;

  /**
   * @ORM\ManyToOne(targetEntity="JPFichePaieBundle\Entity\User")
   * @ORM\JoinColumn(nullable=false)
   */
    private $createby;

  /**
   * @ORM\ManyToOne(targetEntity="JPFichePaieBundle\Entity\Convention")
   * @ORM\JoinColumn(nullable=false)
   */
  private $convention;

  

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
     * Set name
     *
     * @param string $name
     *
     * @return Compagny
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Compagny
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set contact
     *
     * @param string $contact
     *
     * @return Compagny
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Compagny
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set siret
     *
     * @param integer $siret
     *
     * @return Compagny
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret
     *
     * @return int
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set urssaf
     *
     * @param string $urssaf
     *
     * @return Compagny
     */
    public function setUrssaf($urssaf)
    {
        $this->urssaf = $urssaf;

        return $this;
    }

    /**
     * Get urssaf
     *
     * @return string
     */
    public function getUrssaf()
    {
        return $this->urssaf;
    }

    /**
     * Set naf
     *
     * @param string $naf
     *
     * @return Compagny
     */
    public function setNaf($naf)
    {
        $this->naf = $naf;

        return $this;
    }

    /**
     * Get naf
     *
     * @return string
     */
    public function getNaf()
    {
        return $this->naf;
    }

    /**
     * Set effectif
     *
     * @param integer $effectif
     *
     * @return Compagny
     */
    public function setEffectif($effectif)
    {
        $this->effectif = $effectif;

        return $this;
    }

    /**
     * Get effectif
     *
     * @return int
     */
    public function getEffectif()
    {
        return $this->effectif;
    }

    


    /**
     * Set convention
     *
     * @param \JPFichePaieBundle\Entity\Convention $convention
     *
     * @return Compagny
     */
    public function setConvention(\JPFichePaieBundle\Entity\Convention $convention)
    {
        $this->convention = $convention;

        return $this;
    }

    /**
     * Get convention
     *
     * @return \JPFichePaieBundle\Entity\Convention
     */
    public function getConvention()
    {
        return $this->convention;
    }

   

    /**
     * Set createby
     *
     * @param \JPFichePaieBundle\Entity\User $createby
     *
     * @return Compagny
     */
    public function setCreateby(\JPFichePaieBundle\Entity\User $createby)
    {
        $this->createby = $createby;

        return $this;
    }

    /**
     * Get createby
     *
     * @return \JPFichePaieBundle\Entity\User
     */
    public function getCreateby()
    {
        return $this->createby;
    }
}
