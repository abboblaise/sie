<?php

namespace Saleka\BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Saleka\BibliothequeBundle\Entity\Edition;
use Saleka\BibliothequeBundle\Entity\Fichier;
use Saleka\BibliothequeBundle\Entity\Oeuvre;

/**
 * OeuvreEdition
 *
 * @ORM\Table(name="oeuvre_edition")
 * @ORM\Entity(repositoryClass="Saleka\BibliothequeBundle\Repository\OeuvreEditionRepository")
 */
class OeuvreEdition
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
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Saleka\BibliothequeBundle\Entity\Oeuvre", inversedBy="oeuvreEditions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $oeuvre;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Saleka\BibliothequeBundle\Entity\Edition", inversedBy="oeuvreEditions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $edition;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Saleka\BibliothequeBundle\Entity\Fichier", mappedBy="oeuvreEdition")
     */
    private $fichiers;


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
     * Constructor
     */
    public function __construct()
    {
        $this->fichiers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set oeuvre
     *
     * @param Oeuvre $oeuvre
     *
     * @return OeuvreEdition
     */
    public function setOeuvre(Oeuvre $oeuvre)
    {
        $this->oeuvre = $oeuvre;

        return $this;
    }

    /**
     * Get oeuvre
     *
     * @return Oeuvre
     */
    public function getOeuvre()
    {
        return $this->oeuvre;
    }

    /**
     * Set edition
     *
     * @param Edition $edition
     *
     * @return OeuvreEdition
     */
    public function setEdition(Edition $edition)
    {
        $this->edition = $edition;

        return $this;
    }

    /**
     * Get edition
     *
     * @return Edition
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Add fichier
     *
     * @param Fichier $fichier
     *
     * @return OeuvreEdition
     */
    public function addFichier(Fichier $fichier)
    {
        $this->fichiers[] = $fichier;

        return $this;
    }

    /**
     * Remove fichier
     *
     * @param Fichier $fichier
     */
    public function removeFichier(Fichier $fichier)
    {
        $this->fichiers->removeElement($fichier);
    }

    /**
     * Get fichiers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFichiers()
    {
        return $this->fichiers;
    }

    public function getLibelle()
    {
        return $this->__toString();
    }

    public function __toString()
    {
        if ($this->getEdition() == null or $this->getOeuvre() == null)
            return "";
        else
            return $this->getEdition()->getNumEdition() . " ". $this->getOeuvre()->getTitre();
    }
}
