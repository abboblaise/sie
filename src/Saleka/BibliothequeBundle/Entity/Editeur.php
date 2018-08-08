<?php

namespace Saleka\BibliothequeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Saleka\BibliothequeBundle\Entity\Collection;
use Saleka\BibliothequeBundle\Entity\Edition;

/**
 * Editeur
 *
 * @ORM\Table(name="editeur")
 * @ORM\Entity(repositoryClass="Saleka\BibliothequeBundle\Repository\EditeurRepository")
 */
class Editeur
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
     * @ORM\Column(name="nomEditeur", type="string", length=255)
     */
    private $nomEditeur;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Saleka\BibliothequeBundle\Entity\Collection", mappedBy="editeur")
     */
    private $collections;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Saleka\BibliothequeBundle\Entity\Edition", mappedBy="editeur")
     */
    private $editions;


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
     * Set nomEditeur
     *
     * @param string $nomEditeur
     *
     * @return Editeur
     */
    public function setNomEditeur($nomEditeur)
    {
        $this->nomEditeur = $nomEditeur;

        return $this;
    }

    /**
     * Get nomEditeur
     *
     * @return string
     */
    public function getNomEditeur()
    {
        return $this->nomEditeur;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->collections = new ArrayCollection();
        $this->editions = new ArrayCollection();
    }

    /**
     * Add collection
     *
     * @param Collection $collection
     *
     * @return Editeur
     */
    public function addCollection(Collection $collection)
    {
        $this->collections[] = $collection;

        return $this;
    }

    /**
     * Remove collection
     *
     * @param Collection $collection
     */
    public function removeCollection(Collection $collection)
    {
        $this->collections->removeElement($collection);
    }

    /**
     * Get collections
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCollections()
    {
        return $this->collections;
    }

    /**
     * Add edition
     *
     * @param Edition $edition
     *
     * @return Editeur
     */
    public function addEdition(Edition $edition)
    {
        $this->editions[] = $edition;

        return $this;
    }

    /**
     * Remove edition
     *
     * @param Edition $edition
     */
    public function removeEdition(Edition $edition)
    {
        $this->editions->removeElement($edition);
    }

    /**
     * Get editions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEditions()
    {
        return $this->editions;
    }

    public function __toString()
    {
        if ($this->getNomEditeur() == null)
            return "";
        else
            return $this->getNomEditeur();
    }
}
