<?php

namespace Saleka\BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fichier
 *
 * @ORM\Table(name="fichier")
 * @ORM\Entity(repositoryClass="Saleka\BibliothequeBundle\Repository\FichierRepository")
 */
class Fichier
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
     * @var int
     *
     * @ORM\Column(name="numOrdre", type="integer", nullable=true)
     */
    private $numOrdre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=255, unique=true)
     */
    private $localisation;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Saleka\BibliothequeBundle\Entity\OeuvreEdition", inversedBy="fichiers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $oeuvreEdition;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Saleka\BibliothequeBundle\Entity\Lire", mappedBy="fichier")
     */
    private $lectures;


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
     * Set numOrdre
     *
     * @param integer $numOrdre
     *
     * @return Fichier
     */
    public function setNumOrdre($numOrdre)
    {
        $this->numOrdre = $numOrdre;

        return $this;
    }

    /**
     * Get numOrdre
     *
     * @return int
     */
    public function getNumOrdre()
    {
        return $this->numOrdre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Fichier
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set localisation
     *
     * @param string $localisation
     *
     * @return Fichier
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get localisation
     *
     * @return string
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lectures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set oeuvreEdition
     *
     * @param \Saleka\BibliothequeBundle\Entity\OeuvreEdition $oeuvreEdition
     *
     * @return Fichier
     */
    public function setOeuvreEdition(\Saleka\BibliothequeBundle\Entity\OeuvreEdition $oeuvreEdition)
    {
        $this->oeuvreEdition = $oeuvreEdition;

        return $this;
    }

    /**
     * Get oeuvreEdition
     *
     * @return \Saleka\BibliothequeBundle\Entity\OeuvreEdition
     */
    public function getOeuvreEdition()
    {
        return $this->oeuvreEdition;
    }

    /**
     * Add lecture
     *
     * @param \Saleka\BibliothequeBundle\Entity\Lire $lecture
     *
     * @return Fichier
     */
    public function addLecture(\Saleka\BibliothequeBundle\Entity\Lire $lecture)
    {
        $this->lectures[] = $lecture;

        return $this;
    }

    /**
     * Remove lecture
     *
     * @param \Saleka\BibliothequeBundle\Entity\Lire $lecture
     */
    public function removeLecture(\Saleka\BibliothequeBundle\Entity\Lire $lecture)
    {
        $this->lectures->removeElement($lecture);
    }

    /**
     * Get lectures
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLectures()
    {
        return $this->lectures;
    }

    public function __toString()
    {
        if ($this->getDescription() == null)
            return "";
        else
            return $this->getDescription();
    }
}
