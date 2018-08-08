<?php

namespace Saleka\BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Saleka\BibliothequeBundle\Entity\Participer;

/**
 * Auteur
 *
 * @ORM\Table(name="auteur")
 * @ORM\Entity(repositoryClass="Saleka\BibliothequeBundle\Repository\AuteurRepository")
 */
class Auteur
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
     * @ORM\Column(name="nomAuteur", type="string", length=255)
     */
    private $nomAuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomAuteur", type="string", length=255, nullable=true)
     */
    private $prenomAuteur;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Saleka\BibliothequeBundle\Entity\Participer", mappedBy="auteur")
     */
    private $participations;


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
     * Set nomAuteur
     *
     * @param string $nomAuteur
     *
     * @return Auteur
     */
    public function setNomAuteur($nomAuteur)
    {
        $this->nomAuteur = $nomAuteur;

        return $this;
    }

    /**
     * Get nomAuteur
     *
     * @return string
     */
    public function getNomAuteur()
    {
        return $this->nomAuteur;
    }

    /**
     * Set prenomAuteur
     *
     * @param string $prenomAuteur
     *
     * @return Auteur
     */
    public function setPrenomAuteur($prenomAuteur)
    {
        $this->prenomAuteur = $prenomAuteur;

        return $this;
    }

    /**
     * Get prenomAuteur
     *
     * @return string
     */
    public function getPrenomAuteur()
    {
        return $this->prenomAuteur;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->participations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add participation
     *
     * @param Participer $participation
     *
     * @return Auteur
     */
    public function addParticipation(Participer $participation)
    {
        $this->participations[] = $participation;

        return $this;
    }

    /**
     * Remove participation
     *
     * @param Participer $participation
     */
    public function removeParticipation(Participer $participation)
    {
        $this->participations->removeElement($participation);
    }

    /**
     * Get participations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipations()
    {
        return $this->participations;
    }

    public function __toString()
    {
        return $this->getNomAuteur(). ' '.$this->getPrenomAuteur();
    }
}
