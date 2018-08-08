<?php

namespace Saleka\BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Saleka\BibliothequeBundle\Entity\Editeur;
use Saleka\BibliothequeBundle\Entity\NatureEdition;

/**
 * Edition
 *
 * @ORM\Table(name="edition")
 * @ORM\Entity(repositoryClass="Saleka\BibliothequeBundle\Repository\EditionRepository")
 */
class Edition
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
     * @ORM\Column(name="isbn", type="string", length=255, nullable=true)
     */
    private $isbn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePublication", type="date", nullable=true)
     */
    private $datePublication;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuPublication", type="string", length=255, nullable=true)
     */
    private $lieuPublication;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrPages", type="integer", nullable=true)
     */
    private $nbrPages;

    /**
     * @var string
     *
     * @ORM\Column(name="couverture", type="string", length=255)
     */
    private $couverture;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duree", type="time", nullable=true)
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="numEdition", type="string", length=255)
     */
    private $numEdition;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Saleka\BibliothequeBundle\Entity\Editeur", inversedBy="editions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $editeur;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Saleka\BibliothequeBundle\Entity\NatureEdition", inversedBy="editions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $natureEdition;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Saleka\BibliothequeBundle\Entity\OeuvreEdition", mappedBy="edition")
     */
    private $oeuvreEditions;


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
     * Set isbn
     *
     * @param string $isbn
     *
     * @return Edition
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get isbn
     *
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set datePublication
     *
     * @param \DateTime $datePublication
     *
     * @return Edition
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    /**
     * Get datePublication
     *
     * @return \DateTime
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Set lieuPublication
     *
     * @param string $lieuPublication
     *
     * @return Edition
     */
    public function setLieuPublication($lieuPublication)
    {
        $this->lieuPublication = $lieuPublication;

        return $this;
    }

    /**
     * Get lieuPublication
     *
     * @return string
     */
    public function getLieuPublication()
    {
        return $this->lieuPublication;
    }

    /**
     * Set nbrPages
     *
     * @param integer $nbrPages
     *
     * @return Edition
     */
    public function setNbrPages($nbrPages)
    {
        $this->nbrPages = $nbrPages;

        return $this;
    }

    /**
     * Get nbrPages
     *
     * @return int
     */
    public function getNbrPages()
    {
        return $this->nbrPages;
    }

    /**
     * Set couverture
     *
     * @param string $couverture
     *
     * @return Edition
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
     * Set duree
     *
     * @param \DateTime $duree
     *
     * @return Edition
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return \DateTime
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set numEdition
     *
     * @param string $numEdition
     *
     * @return Edition
     */
    public function setNumEdition($numEdition)
    {
        $this->numEdition = $numEdition;

        return $this;
    }

    /**
     * Get numEdition
     *
     * @return string
     */
    public function getNumEdition()
    {
        return $this->numEdition;
    }

    /**
     * Set editeur
     *
     * @param Editeur $editeur
     *
     * @return Edition
     */
    public function setEditeur(Editeur $editeur)
    {
        $this->editeur = $editeur;

        return $this;
    }

    /**
     * Get editeur
     *
     * @return Editeur
     */
    public function getEditeur()
    {
        return $this->editeur;
    }

    /**
     * Set natureEdition
     *
     * @param NatureEdition $natureEdition
     *
     * @return Edition
     */
    public function setNatureEdition(NatureEdition $natureEdition)
    {
        $this->natureEdition = $natureEdition;

        return $this;
    }

    /**
     * Get natureEdition
     *
     * @return NatureEdition
     */
    public function getNatureEdition()
    {
        return $this->natureEdition;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->oeuvreEditions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add oeuvreEdition
     *
     * @param \Saleka\BibliothequeBundle\Entity\OeuvreEdition $oeuvreEdition
     *
     * @return Edition
     */
    public function addOeuvreEdition(\Saleka\BibliothequeBundle\Entity\OeuvreEdition $oeuvreEdition)
    {
        $this->oeuvreEditions[] = $oeuvreEdition;

        return $this;
    }

    /**
     * Remove oeuvreEdition
     *
     * @param \Saleka\BibliothequeBundle\Entity\OeuvreEdition $oeuvreEdition
     */
    public function removeOeuvreEdition(\Saleka\BibliothequeBundle\Entity\OeuvreEdition $oeuvreEdition)
    {
        $this->oeuvreEditions->removeElement($oeuvreEdition);
    }

    /**
     * Get oeuvreEditions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOeuvreEditions()
    {
        return $this->oeuvreEditions;
    }

    public function __toString()
    {
        if ($this->getNumEdition() == null)
            return "";
        else
            return $this->getNumEdition();
    }
}
