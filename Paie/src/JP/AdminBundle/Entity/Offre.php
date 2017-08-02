<?php

namespace JP\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="offre")
 * @ORM\Entity(repositoryClass="JP\AdminBundle\Repository\OffreRepository")
 */
class Offre
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal", precision=10, scale=2)
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="nbulletin", type="integer")
     */
    private $nbulletin;


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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Offre
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return Offre
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set nbulletin
     *
     * @param integer $nbulletin
     *
     * @return Offre
     */
    public function setNbulletin($nbulletin)
    {
        $this->nbulletin = $nbulletin;

        return $this;
    }

    /**
     * Get nbulletin
     *
     * @return int
     */
    public function getNbulletin()
    {
        return $this->nbulletin;
    }
}

