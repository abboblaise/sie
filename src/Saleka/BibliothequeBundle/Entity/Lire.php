<?php

namespace Saleka\BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lire
 *
 * @ORM\Table(name="lire")
 * @ORM\Entity(repositoryClass="Saleka\BibliothequeBundle\Repository\LireRepository")
 */
class Lire
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateLecture", type="datetime")
     */
    private $dateLecture;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentageLecture", type="float", nullable=true)
     */
    private $pourcentageLecture;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Saleka\BibliothequeBundle\Entity\Fichier", inversedBy="lectures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fichier;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Saleka\BibliothequeBundle\Entity\Lecteur", inversedBy="lectures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lecteur;

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
     * Set dateLecture
     *
     * @param \DateTime $dateLecture
     *
     * @return Lire
     */
    public function setDateLecture($dateLecture)
    {
        $this->dateLecture = $dateLecture;

        return $this;
    }

    /**
     * Get dateLecture
     *
     * @return \DateTime
     */
    public function getDateLecture()
    {
        return $this->dateLecture;
    }

    /**
     * Set pourcentageLecture
     *
     * @param float $pourcentageLecture
     *
     * @return Lire
     */
    public function setPourcentageLecture($pourcentageLecture)
    {
        $this->pourcentageLecture = $pourcentageLecture;

        return $this;
    }

    /**
     * Get pourcentageLecture
     *
     * @return float
     */
    public function getPourcentageLecture()
    {
        return $this->pourcentageLecture;
    }

    /**
     * Set fichier
     *
     * @param \Saleka\BibliothequeBundle\Entity\Fichier $fichier
     *
     * @return Lire
     */
    public function setFichier(\Saleka\BibliothequeBundle\Entity\Fichier $fichier)
    {
        $this->fichier = $fichier;

        return $this;
    }

    /**
     * Get fichier
     *
     * @return \Saleka\BibliothequeBundle\Entity\Fichier
     */
    public function getFichier()
    {
        return $this->fichier;
    }

    /**
     * Set lecteur
     *
     * @param \Saleka\BibliothequeBundle\Entity\Lecteur $lecteur
     *
     * @return Lire
     */
    public function setLecteur(\Saleka\BibliothequeBundle\Entity\Lecteur $lecteur)
    {
        $this->lecteur = $lecteur;

        return $this;
    }

    /**
     * Get lecteur
     *
     * @return \Saleka\BibliothequeBundle\Entity\Lecteur
     */
    public function getLecteur()
    {
        return $this->lecteur;
    }

    public function __toString()
    {
        if ($this->getDateLecture() == null)
            return "";
        else
            return $this->getLecteur(). " ".$this->getFichier();
    }
}
