<?php

namespace JPFichePaieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fichepaie
 *
 * @ORM\Table(name="fichepaie")
 * @ORM\Entity(repositoryClass="JPFichePaieBundle\Repository\FichepaieRepository")
 */
class Fichepaie
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
     * @ORM\Column(name="realise", type="string", length=255)
     */
    private $realise;    

    /**
     * @var \DateTime
     *
     *@ORM\Column(name="date_heure", type="datetime")
     */
    private $dateheure;

    
     /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_dedut", type="date")
     */
    private $datedu ;

     /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date")
     */
    private $dateau ;

     /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_paie", type="date")
     */
    private $datepaie ;

    /**
     * @var string
     *
     * @ORM\Column(name="salaire_brut", type="decimal", precision=10, scale=2)
     */
    private $salairebrut = '';

    /**
     * @var string
     *
     * @ORM\Column(name="heures_sup25", type="decimal", precision=10, scale=2)
     */
    private $heuressup25 = '';

    /**
     * @var string
     *
     * @ORM\Column(name="heures_sup10", type="decimal", precision=10, scale=2)
     */
    private $heuressup10 = '';

    /**
     * @var string
     *
     * @ORM\Column(name="heures_sup50", type="decimal", precision=10, scale=2)
     */
    private $heuressup50 = '';

    /**
     * @var string
     *
     * @ORM\Column(name="taux_transport", type="decimal", precision=10, scale=2)
     */
    private $tauxtransport = '';

    /**
     * @var string
     *
     * @ORM\Column(name="taux_accident", type="decimal", precision=10, scale=2)
     */
    private $tauxaccident = '';

   
   
/**
     * @var string
     *
     * @ORM\Column(name="valeur_prime", type="decimal", precision=10, scale=2)
     */
    private $valeurprime = '';

    

    /**
     * @var string
     *
     * @ORM\Column(name="valeur_avantage", type="decimal", precision=10, scale=2)
     */
    private $valeuravantage = '';

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_hr_w", type="decimal", precision=10, scale=2)
     */
    private $nombreheuretravail = '';

   /**
     * @var string
     *
     * @ORM\Column(name="couverture", type="decimal", precision=10, scale=2)
     */
    private $couverture = '';

    /**
     * @var string
     *
     * @ORM\Column(name="complement", type="decimal", precision=10, scale=2)
     */
    private $complement = '';

    /**
     * @var string
     *
     * @ORM\Column(name="charge_employe", type="decimal", precision=10, scale=2)
     */
    private $chargemployeur = '';

    /**
     * @var string
     *
     * @ORM\Column(name="conge_paye", type="decimal", precision=10, scale=2)
     */
    private $congepaye = ''  ;
/**
     * @var string
     *
     * @ORM\Column(name="arret_maladie", type="decimal", precision=10, scale=2)
     */
    private $arretmaladie = '' ;

    /**
     * @var string
     *
     * @ORM\Column(name="abscongsasold", type="decimal", precision=10, scale=2)
     */
    private $abscongsasold = '' ;

    /**
     * @var string
     *
     * @ORM\Column(name="conge_acquis", type="decimal", precision=10, scale=2)
     */
    private $congeacquis = '' ;

   /**
     * @var string
     *
     * @ORM\Column(name="conge_pris", type="decimal", precision=10, scale=2)
     */
    private $congepris = '' ;

   /**
     * @var string
     *
     * @ORM\Column(name="cumule_hr", type="decimal", precision=10, scale=2)
     */
    private $cumulehr = '';

     /**
     * @var string
     *
     * @ORM\Column(name="cumule_hrsup", type="decimal", precision=10, scale=2)
     */
    private $cumule_hrsup = '' ;

    /**
     * @var string
     *
     * @ORM\Column(name="cumule_base", type="decimal", precision=10, scale=2)
     */
    private $cumulebase = '' ;

    /**
     * @var string
     *
     * @ORM\Column(name="cumbr", type="decimal", precision=10, scale=2)
     */
    private $cumbr = '' ;

    /**
     * @var string
     *
     * @ORM\Column(name="cumule_impaye", type="decimal", precision=10, scale=2)
     */
    private $cumuleimpaye = '' ;

    
   /**
     * @var string
     *
     * @ORM\Column(name="frais_transport", type="decimal", precision=10, scale=2)
     */
    private $fraistransport = '' ;
/**
     * @var string
     *
     * @ORM\Column(name="reprise_avantage", type="decimal", precision=10, scale=2)
     */
    private $repriseavantage = '' ;

 /**
     * @var string
     *
     * @ORM\Column(name="nbrticket_resto", type="integer")
     */
    private $nbrticketresto = '' ;
    /**
     * @var string
     *
     * @ORM\Column(name="ticket_resto", type="decimal", precision=10, scale=2)
     */
    private $ticketresto = '' ;

 /**
   * @ORM\ManyToOne(targetEntity="JP\AdminBundle\Entity\AvantageSalary")
   * 
   */
  private $typeavantage ;

   /**
   * @ORM\ManyToOne(targetEntity="JP\AdminBundle\Entity\PrimeSalary")
   * 
   */
  private $typeprime ;

   /**
   * @ORM\ManyToOne(targetEntity="JP\AdminBundle\Entity\ModePaie")
   * 
   */
  private $modepaie ;

  /**
   * @ORM\ManyToOne(targetEntity="JPFichePaieBundle\Entity\User")
   * @ORM\JoinColumn(nullable=false)
   */
private $createby ;

/**
   * @ORM\ManyToOne(targetEntity="JPFichePaieBundle\Entity\InfoUser", cascade={"persist"})
   * @ORM\JoinColumn(nullable=false)
   */

  private $infouser ;

   

public function __construct()
  {
    $this->dateheure = new \Datetime();
    $this->datepaie = new \Datetime();

    $this->datedu = new \Datetime();
    $this->dateau = new \Datetime();

  }
   
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set realise
     *
     * @param string $realise
     *
     * @return Fichepaie
     */
    public function setRealise($realise)
    {
        $this->realise = $realise;

        return $this;
    }

    /**
     * Get realise
     *
     * @return string
     */
    public function getRealise()
    {
        return $this->realise;
    }

    /**
     * Set datedu
     *
     * @param \DateTime $datedu
     *
     * @return Fichepaie
     */
    public function setDatedu($datedu)
    {
        $this->datedu = $datedu;


        return $this;
    }

    /**
     * Get datedu
     *
     * @return \DateTime
     */
    public function getDatedu()
    {
        return $this->datedu;
    }

    /**
     * Set dateau
     *
     * @param \DateTime $dateau
     *
     * @return Fichepaie
     */
    public function setDateau($dateau)
    {
        $this->dateau = $dateau;

        return $this;
    }

    /**
     * Get dateau
     *
     * @return \DateTime
     */
    public function getDateau()
    {
        return $this->dateau;
    }

    /**
     * Set datepaie
     *
     * @param \DateTime $datepaie
     *
     * @return Fichepaie
     */
    public function setDatepaie($datepaie)
    {
        $this->datepaie = $datepaie;

        return $this;
    }

    /**
     * Get datepaie
     *
     * @return \DateTime
     */
    public function getDatepaie()
    {
        return $this->datepaie;
    }

    /**
     * Set salairebrut
     *
     * @param string $salairebrut
     *
     * @return Fichepaie
     */
    public function setSalairebrut($salairebrut)
    {
        $this->salairebrut = $salairebrut;

        return $this;
    }

    /**
     * Get salairebrut
     *
     * @return string
     */
    public function getSalairebrut()
    {
        return $this->salairebrut;
    }

    /**
     * Set heuressup25
     *
     * @param string $heuressup25
     *
     * @return Fichepaie
     */
    public function setHeuressup25($heuressup25)
    {
        $this->heuressup25 = $heuressup25;

        return $this;
    }

    /**
     * Get heuressup25
     *
     * @return string
     */
    public function getHeuressup25()
    {
        return $this->heuressup25;
    }

    /**
     * Set heuressup10
     *
     * @param string $heuressup10
     *
     * @return Fichepaie
     */
    public function setHeuressup10($heuressup10)
    {
        $this->heuressup10 = $heuressup10;

        return $this;
    }

    /**
     * Get heuressup10
     *
     * @return string
     */
    public function getHeuressup10()
    {
        return $this->heuressup10;
    }

    /**
     * Set heuressup50
     *
     * @param string $heuressup50
     *
     * @return Fichepaie
     */
    public function setHeuressup50($heuressup50)
    {
        $this->heuressup50 = $heuressup50;

        return $this;
    }

    /**
     * Get heuressup50
     *
     * @return string
     */
    public function getHeuressup50()
    {
        return $this->heuressup50;
    }

    /**
     * Set tauxtransport
     *
     * @param string $tauxtransport
     *
     * @return Fichepaie
     */
    public function setTauxtransport($tauxtransport)
    {
        $this->tauxtransport = $tauxtransport;

        return $this;
    }

    /**
     * Get tauxtransport
     *
     * @return string
     */
    public function getTauxtransport()
    {
        return $this->tauxtransport;
    }

    /**
     * Set tauxaccident
     *
     * @param string $tauxaccident
     *
     * @return Fichepaie
     */
    public function setTauxaccident($tauxaccident)
    {
        $this->tauxaccident = $tauxaccident;

        return $this;
    }

    /**
     * Get tauxaccident
     *
     * @return string
     */
    public function getTauxaccident()
    {
        return $this->tauxaccident;
    }

   

    /**
     * Set valeurprime
     *
     * @param string $valeurprime
     *
     * @return Fichepaie
     */
    public function setValeurprime($valeurprime)
    {
        $this->valeurprime = $valeurprime;

        return $this;
    }

    /**
     * Get valeurprime
     *
     * @return string
     */
    public function getValeurprime()
    {
        return $this->valeurprime;
    }

    
    /**
     * Set valeuravantage
     *
     * @param string $valeuravantage
     *
     * @return Fichepaie
     */
    public function setValeuravantage($valeuravantage)
    {
        $this->valeuravantage = $valeuravantage;

        return $this;
    }

    /**
     * Get valeuravantage
     *
     * @return string
     */
    public function getValeuravantage()
    {
        return $this->valeuravantage;
    }

    /**
     * Set nombreheuretravail
     *
     * @param string $nombreheuretravail
     *
     * @return Fichepaie
     */
    public function setNombreheuretravail($nombreheuretravail)
    {
        $this->nombreheuretravail = $nombreheuretravail;

        return $this;
    }

    /**
     * Get nombreheuretravail
     *
     * @return string
     */
    public function getNombreheuretravail()
    {
        return $this->nombreheuretravail;
    }

    /**
     * Set couverture
     *
     * @param string $couverture
     *
     * @return Fichepaie
     */
    public function setCouverture($couverture)
    {
        $this->couverture = $couverture;

        return $this;
    }

    /**
     * Get couverture
     *
     * @return string
     */
    public function getCouverture()
    {
        return $this->couverture;
    }

    /**
     * Set complement
     *
     * @param string $complement
     *
     * @return Fichepaie
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * Get complement
     *
     * @return string
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Set chargemployeur
     *
     * @param string $chargemployeur
     *
     * @return Fichepaie
     */
    public function setChargemployeur($chargemployeur)
    {
        $this->chargemployeur = $chargemployeur;

        return $this;
    }

    /**
     * Get chargemployeur
     *
     * @return string
     */
    public function getChargemployeur()
    {
        return $this->chargemployeur;
    }

    /**
     * Set congepaye
     *
     * @param string $congepaye
     *
     * @return Fichepaie
     */
    public function setCongepaye($congepaye)
    {
        $this->congepaye = $congepaye;

        return $this;
    }

    /**
     * Get congepaye
     *
     * @return string
     */
    public function getCongepaye()
    {
        return $this->congepaye;
    }

    /**
     * Set arretmaladie
     *
     * @param string $arretmaladie
     *
     * @return Fichepaie
     */
    public function setArretmaladie($arretmaladie)
    {
        $this->arretmaladie = $arretmaladie;

        return $this;
    }

    /**
     * Get arretmaladie
     *
     * @return string
     */
    public function getArretmaladie()
    {
        return $this->arretmaladie;
    }

    /**
     * Set abscongsasold
     *
     * @param string $abscongsasold
     *
     * @return Fichepaie
     */
    public function setAbscongsasold($abscongsasold)
    {
        $this->abscongsasold = $abscongsasold;

        return $this;
    }

    /**
     * Get abscongsasold
     *
     * @return string
     */
    public function getAbscongsasold()
    {
        return $this->abscongsasold;
    }

    /**
     * Set congeacquis
     *
     * @param string $congeacquis
     *
     * @return Fichepaie
     */
    public function setCongeacquis($congeacquis)
    {
        $this->congeacquis = $congeacquis;

        return $this;
    }

    /**
     * Get congeacquis
     *
     * @return string
     */
    public function getCongeacquis()
    {
        return $this->congeacquis;
    }

    /**
     * Set congepris
     *
     * @param string $congepris
     *
     * @return Fichepaie
     */
    public function setCongepris($congepris)
    {
        $this->congepris = $congepris;

        return $this;
    }

    /**
     * Get congepris
     *
     * @return string
     */
    public function getCongepris()
    {
        return $this->congepris;
    }

    /**
     * Set cumulehr
     *
     * @param string $cumulehr
     *
     * @return Fichepaie
     */
    public function setCumulehr($cumulehr)
    {
        $this->cumulehr = $cumulehr;

        return $this;
    }

    /**
     * Get cumulehr
     *
     * @return string
     */
    public function getCumulehr()
    {
        return $this->cumulehr;
    }

    /**
     * Set cumuleHrsup
     *
     * @param string $cumuleHrsup
     *
     * @return Fichepaie
     */
    public function setCumuleHrsup($cumuleHrsup)
    {
        $this->cumule_hrsup = $cumuleHrsup;

        return $this;
    }

    /**
     * Get cumuleHrsup
     *
     * @return string
     */
    public function getCumuleHrsup()
    {
        return $this->cumule_hrsup;
    }

    /**
     * Set cumulebase
     *
     * @param string $cumulebase
     *
     * @return Fichepaie
     */
    public function setCumulebase($cumulebase)
    {
        $this->cumulebase = $cumulebase;

        return $this;
    }

    /**
     * Get cumulebase
     *
     * @return string
     */
    public function getCumulebase()
    {
        return $this->cumulebase;
    }

    /**
     * Set cumbr
     *
     * @param string $cumbr
     *
     * @return Fichepaie
     */
    public function setCumbr($cumbr)
    {
        $this->cumbr = $cumbr;

        return $this;
    }

    /**
     * Get cumbr
     *
     * @return string
     */
    public function getCumbr()
    {
        return $this->cumbr;
    }

    /**
     * Set cumuleimpaye
     *
     * @param string $cumuleimpaye
     *
     * @return Fichepaie
     */
    public function setCumuleimpaye($cumuleimpaye)
    {
        $this->cumuleimpaye = $cumuleimpaye;

        return $this;
    }

    /**
     * Get cumuleimpaye
     *
     * @return string
     */
    public function getCumuleimpaye()
    {
        return $this->cumuleimpaye;
    }

   

    /**
     * Set fraistransport
     *
     * @param string $fraistransport
     *
     * @return Fichepaie
     */
    public function setFraistransport($fraistransport)
    {
        $this->fraistransport = $fraistransport;

        return $this;
    }

    /**
     * Get fraistransport
     *
     * @return string
     */
    public function getFraistransport()
    {
        return $this->fraistransport;
    }

    /**
     * Set repriseavantage
     *
     * @param string $repriseavantage
     *
     * @return Fichepaie
     */
    public function setRepriseavantage($repriseavantage)
    {
        $this->repriseavantage = $repriseavantage;

        return $this;
    }

    /**
     * Get repriseavantage
     *
     * @return string
     */
    public function getRepriseavantage()
    {
        return $this->repriseavantage;
    }

     /**
     * Set ticketresto
     *
     * @param string $ticketresto
     *
     * @return Fichepaie
     */
    public function setNbrticketresto($nbrticketresto)
    {
        $this->nbrticketresto = $nbrticketresto;

        return $this;
    }

    /**
     * Get ticketresto
     *
     * @return string
     */
    public function getNbrticketresto()
    {
        return $this->nbrticketresto;
    }

    /**
     * Set ticketresto
     *
     * @param string $ticketresto
     *
     * @return Fichepaie
     */
    public function setTicketresto($ticketresto)
    {
        $this->ticketresto = $ticketresto;

        return $this;
    }

    /**
     * Get ticketresto
     *
     * @return string
     */
    public function getTicketresto()
    {
        return $this->ticketresto;
    }

  

   
    /**
     * Set createby
     *
     * @param \JPFichePaieBundle\Entity\User $createby
     *
     * @return Fichepaie
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

   

    /**
     * Set typeavantage
     *
     * @param \JP\AdminBundle\Entity\AvantageSalary $typeavantage
     *
     * @return Fichepaie
     */
    public function setTypeavantage(\JP\AdminBundle\Entity\AvantageSalary $typeavantage = null)
    {
        $this->typeavantage = $typeavantage;

        return $this;
    }

    /**
     * Get typeavantage
     *
     * @return \JP\AdminBundle\Entity\AvantageSalary
     */
    public function getTypeavantage()
    {
        return $this->typeavantage;
    }

    /**
     * Set typeprime
     *
     * @param \JP\AdminBundle\Entity\PrimeSalary $typeprime
     *
     * @return Fichepaie
     */
    public function setTypeprime(\JP\AdminBundle\Entity\PrimeSalary $typeprime = null)
    {
        $this->typeprime = $typeprime;

        return $this;
    }

    /**
     * Get typeprime
     *
     * @return \JP\AdminBundle\Entity\PrimeSalary
     */
    public function getTypeprime()
    {
        return $this->typeprime;
    }

    /**
     * Set modepaie
     *
     * @param \JP\AdminBundle\Entity\ModePaie $modepaie
     *
     * @return Fichepaie
     */
    public function setModepaie(\JP\AdminBundle\Entity\ModePaie $modepaie)
    {
        $this->modepaie = $modepaie;

        return $this;
    }

    /**
     * Get modepaie
     *
     * @return \JP\AdminBundle\Entity\ModePaie
     */
    public function getModepaie()
    {
        return $this->modepaie;
    }

    /**
     * Set dateheure
     *
     * @param \DateTime $dateheure
     *
     * @return Fichepaie
     */
    public function setDateheure($dateheure)
    {
        $this->dateheure = $dateheure;

        return $this;
    }

    /**
     * Get dateheure
     *
     * @return \DateTime
     */
    public function getDateheure()
    {
        return $this->dateheure;
    }

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
