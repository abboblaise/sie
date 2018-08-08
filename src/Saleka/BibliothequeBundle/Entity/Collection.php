<?php

namespace Saleka\BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Saleka\BibliothequeBundle\Entity\Editeur;

/**
 * Collection
 *
 * @ORM\Table(name="collection")
 * @ORM\Entity(repositoryClass="Saleka\BibliothequeBundle\Repository\CollectionRepository")
 */
class Collection
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
     * @ORM\Column(name="nomCollection", type="string", length=255)
     */
    private $nomCollection;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Saleka\BibliothequeBundle\Entity\Editeur", inversedBy="collections")
     * @ORM\JoinColumn(nullable=false)
     */
    private $editeur;


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
     * Set nomCollection
     *
     * @param string $nomCollection
     *
     * @return Collection
     */
    public function setNomCollection($nomCollection)
    {
        $this->nomCollection = $nomCollection;

        return $this;
    }

    /**
     * Get nomCollection
     *
     * @return string
     */
    public function getNomCollection()
    {
        return $this->nomCollection;
    }

    /**
     * Set editeur
     *
     * @param Editeur $editeur
     *
     * @return Collection
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
}
