<?php

namespace JPFichePaieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfoUser
 *
 * @ORM\Table(name="info_user")
 * @ORM\Entity(repositoryClass="JPFichePaieBundle\Repository\InfoUserRepository")
 */
class InfoUser
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
     * @ORM\Column(name="nom_prenom", type="string", length=255)
     */
    private $nomPrenom ='';

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse ='';

    /**
     * @var string
     *
     * @ORM\Column(name="num_secur", type="string", length=255)
     */
    private $numSecur ='';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ent", type="date")
     */
    private $dateEnt;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=255)
     */
    private $matricule ='';


 /**
   * @ORM\ManyToOne(targetEntity="JP\AdminBundle\Entity\EmploiSalary")
   * @ORM\JoinColumn(nullable=true)
   */
  private $emploi;

  /**
   * @ORM\ManyToOne(targetEntity="JP\AdminBundle\Entity\StatusSalary")
   * @ORM\JoinColumn(nullable=true)
   */
  private $status;

   /**
   * @ORM\ManyToOne(targetEntity="JP\AdminBundle\Entity\PositionSalary")
   * @ORM\JoinColumn(nullable=true)
   */
  private $position;
  
   /**
   * @ORM\ManyToOne(targetEntity="JPFichePaieBundle\Entity\Compagny")
   * @ORM\JoinColumn(nullable=true)
   */
  private $compagny;


  public function __construct()  {   
$this->dateEnt = new \Datetime();
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
     * Set nomPrenom
     *
     * @param string $nomPrenom
     *
     * @return InfoUser
     */
    public function setNomPrenom($nomPrenom)
    {
        $this->nomPrenom = $nomPrenom;

        return $this;
    }

    /**
     * Get nomPrenom
     *
     * @return string
     */
    public function getNomPrenom()
    {
        return $this->nomPrenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return InfoUser
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set numSecur
     *
     * @param string $numSecur
     *
     * @return InfoUser
     */
    public function setNumSecur($numSecur)
    {
        $this->numSecur = $numSecur;

        return $this;
    }

    /**
     * Get numSecur
     *
     * @return string
     */
    public function getNumSecur()
    {
        return $this->numSecur;
    }

    /**
     * Set dateEnt
     *
     * @param \DateTime $dateEnt
     *
     * @return InfoUser
     */
    public function setDateEnt($dateEnt)
    {
        $this->dateEnt = $dateEnt;

        return $this;
    }

    /**
     * Get dateEnt
     *
     * @return \DateTime
     */
    public function getDateEnt()
    {
        return $this->dateEnt;
    }

    /**
     * Set matricule
     *
     * @param string $matricule
     *
     * @return InfoUser
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set emploi
     *
     * @param \JP\AdminBundle\Entity\EmploiSalary $emploi
     *
     * @return InfoUser
     */
    public function setEmploi(\JP\AdminBundle\Entity\EmploiSalary $emploi)
    {
        $this->emploi = $emploi;

        return $this;
    }

    /**
     * Get emploi
     *
     * @return \JP\AdminBundle\Entity\EmploiSalary
     */
    public function getEmploi()
    {
        return $this->emploi;
    }

    /**
     * Set position
     *
     * @param \JP\AdminBundle\Entity\PositionSalary $position
     *
     * @return InfoUser
     */
    public function setPosition(\JP\AdminBundle\Entity\PositionSalary $position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return \JP\AdminBundle\Entity\PositionSalary
     */
    public function getPosition()
    {
        return $this->position;
    }

    

    /**
     * Set compagny
     *
     * @param \JPFichePaieBundle\Entity\Compagny $compagny
     *
     * @return InfoUser
     */
    public function setCompagny(\JPFichePaieBundle\Entity\Compagny $compagny)
    {
        $this->compagny = $compagny;

        return $this;
    }

    /**
     * Get compagny
     *
     * @return \JPFichePaieBundle\Entity\Compagny
     */
    public function getCompagny()
    {
        return $this->compagny;
    }

    /**
     * Set status
     *
     * @param \JP\AdminBundle\Entity\StatusSalary $status
     *
     * @return InfoUser
     */
    public function setStatus(\JP\AdminBundle\Entity\StatusSalary $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \JP\AdminBundle\Entity\StatusSalary
     */
    public function getStatus()
    {
        return $this->status;
    }
}
