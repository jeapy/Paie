<?php

namespace JPFichePaieBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Paie
* @ORM\Table(name="paie")
 * @ORM\Entity(repositoryClass="JPFichePaieBundle\Repository\PaieRepository")
 */
class Paie
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(name="offredu", type="date")
     */
    private $offredu;

    /**
     * @var \DateTime
     * @ORM\Column(name="offreau", type="date")
     */
    private $offreau;

    /**
     * @var int
     *@ORM\Column(name="nombrefiche", type="integer")
     */
    private $nombrefiche;

    /**
     * @var \DateTime
     * @ORM\Column(name="datepaiement", type="date")
     */
    private $datepaiement;

    /**
    * @ORM\ManyToOne(targetEntity="JPFichePaieBundle\Entity\User", cascade={"persist"})
    * @ORM\JoinColumn(nullable=false)
    */
    private $user ;


    /**
    * @ORM\ManyToOne(targetEntity="JP\AdminBundle\Entity\Offre", cascade={"persist"})
    * @ORM\JoinColumn(nullable=false)
    */
    private $offre ;


  
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
     * Set offredu
     *
     * @param \DateTime $offredu
     *
     * @return Paie
     */
    public function setOffredu($offredu)
    {
        $this->offredu = $offredu;

        return $this;
    }

    /**
     * Get offredu
     *
     * @return \DateTime
     */
    public function getOffredu()
    {
        return $this->offredu;
    }

    /**
     * Set offreau
     *
     * @param \DateTime $offreau
     *
     * @return Paie
     */
    public function setOffreau($offreau)
    {
        $this->offreau = $offreau;

        return $this;
    }

    /**
     * Get offreau
     *
     * @return \DateTime
     */
    public function getOffreau()
    {
        return $this->offreau;
    }

    

    /**
     * Set datepaiement
     *
     * @param \DateTime $datepaiement
     *
     * @return Paie
     */
    public function setDatepaiement($datepaiement)
    {
        $this->datepaiement = $datepaiement;

        return $this;
    }

    /**
     * Get datepaiement
     *
     * @return \DateTime
     */
    public function getDatepaiement()
    {
        return $this->datepaiement;
    }

   

    

    /**
     * Set nombrefiche
     *
     * @param string $nombrefiche
     *
     * @return Paie
     */
    public function setNombrefiche($nombrefiche)
    {
        $this->nombrefiche = $nombrefiche;

        return $this;
    }

    /**
     * Get nombrefiche
     *
     * @return string
     */
    public function getNombrefiche()
    {
        return $this->nombrefiche;
    }

    
    /**
     * Set offre
     *
     * @param \JP\AdminBundle\Entity\Offre $offre
     *
     * @return Paie
     */
    public function setOffre(\JP\AdminBundle\Entity\Offre $offre)
    {
        $this->offre = $offre;

        return $this;
    }

    /**
     * Get offre
     *
     * @return \JP\AdminBundle\Entity\Offre
     */
    public function getOffre()
    {
        return $this->offre;
    }

    /**
     * Set user
     *
     * @param \JPFichePaieBundle\Entity\User $user
     *
     * @return Paie
     */
    public function setUser(\JPFichePaieBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \JPFichePaieBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
