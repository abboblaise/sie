<?php

namespace Saleka\BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Saleka\BibliothequeBundle\Entity\Auteur;
use Saleka\BibliothequeBundle\Entity\Oeuvre;

/**
 * Participer
 *
 * @ORM\Table(name="participer")
 * @ORM\Entity(repositoryClass="Saleka\BibliothequeBundle\Repository\ParticiperRepository")
 */
class Participer
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
     * @ORM\Column(name="satutAuteur", type="string", length=255)
     */
    private $satutAuteur;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Saleka\BibliothequeBundle\Entity\Auteur", inversedBy="participations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $auteur;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Saleka\BibliothequeBundle\Entity\Oeuvre", inversedBy="participations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $oeuvre;


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
     * Set satutAuteur
     *
     * @param string $satutAuteur
     *
     * @return Participer
     */
    public function setSatutAuteur($satutAuteur)
    {
        $this->satutAuteur = $satutAuteur;

        return $this;
    }

    /**
     * Get satutAuteur
     *
     * @return string
     */
    public function getSatutAuteur()
    {
        return $this->satutAuteur;
    }

    /**
     * Set auteur
     *
     * @param Auteur $auteur
     *
     * @return Participer
     */
    public function setAuteur(Auteur $auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return Auteur
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set oeuvre
     *
     * @param Oeuvre $oeuvre
     *
     * @return Participer
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
}
