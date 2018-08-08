<?php

namespace Saleka\BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Saleka\BibliothequeBundle\Entity\Categorie;
use Saleka\BibliothequeBundle\Entity\MotCle;
use Saleka\BibliothequeBundle\Entity\OeuvreEdition;

/**
 * Oeuvre
 *
 * @ORM\Table(name="oeuvre")
 * @ORM\Entity(repositoryClass="Saleka\BibliothequeBundle\Repository\OeuvreRepository")
 */
class Oeuvre
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="sousTitre", type="string", length=255, nullable=true)
     */
    private $sousTitre;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="text")
     */
    private $resume;

    /**
     * @var
     *
     * @ORM\ManyToMany(targetEntity="Saleka\BibliothequeBundle\Entity\Categorie", inversedBy="oeuvres")
     * @ORM\JoinTable(name="oeuvres_categories")
     */
    private $categories;

    /**
     * @var
     *
     * @ORM\ManyToMany(targetEntity="Saleka\BibliothequeBundle\Entity\MotCle", inversedBy="oeuvres")
     * @ORM\JoinTable(name="oeuvres_motcles")
     */
    private $motCles;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Saleka\BibliothequeBundle\Entity\Participer", mappedBy="oeuvre")
     */
    private $participations;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Saleka\BibliothequeBundle\Entity\OeuvreEdition", mappedBy="oeuvre")
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Oeuvre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set sousTitre
     *
     * @param string $sousTitre
     *
     * @return Oeuvre
     */
    public function setSousTitre($sousTitre)
    {
        $this->sousTitre = $sousTitre;

        return $this;
    }

    /**
     * Get sousTitre
     *
     * @return string
     */
    public function getSousTitre()
    {
        return $this->sousTitre;
    }

    /**
     * Set resume
     *
     * @param string $resume
     *
     * @return Oeuvre
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string
     */
    public function getResume()
    {
        return $this->resume;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add category
     *
     * @param Categorie $category
     *
     * @return Oeuvre
     */
    public function addCategory(Categorie $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param Categorie $category
     */
    public function removeCategory(Categorie $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add motCle
     *
     * @param MotCle $motCle
     *
     * @return Oeuvre
     */
    public function addMotCle(MotCle $motCle)
    {
        $this->motCles[] = $motCle;

        return $this;
    }

    /**
     * Remove motCle
     *
     * @param MotCle $motCle
     */
    public function removeMotCle(MotCle $motCle)
    {
        $this->motCles->removeElement($motCle);
    }

    /**
     * Get motCles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMotCles()
    {
        return $this->motCles;
    }

    /**
     * Add participation
     *
     * @param \Saleka\BibliothequeBundle\Entity\Participer $participation
     *
     * @return Oeuvre
     */
    public function addParticipation(\Saleka\BibliothequeBundle\Entity\Participer $participation)
    {
        $this->participations[] = $participation;

        return $this;
    }

    /**
     * Remove participation
     *
     * @param \Saleka\BibliothequeBundle\Entity\Participer $participation
     */
    public function removeParticipation(\Saleka\BibliothequeBundle\Entity\Participer $participation)
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

    /**
     * Add oeuvreEdition
     *
     * @param OeuvreEdition $oeuvreEdition
     *
     * @return Oeuvre
     */
    public function addOeuvreEdition(OeuvreEdition $oeuvreEdition)
    {
        $this->oeuvreEditions[] = $oeuvreEdition;

        return $this;
    }

    /**
     * Remove oeuvreEdition
     *
     * @param OeuvreEdition $oeuvreEdition
     */
    public function removeOeuvreEdition(OeuvreEdition $oeuvreEdition)
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
        if ($this->getTitre() == null)
            return "";
        else
            return $this->getTitre();
    }
}
