<?php

namespace Saleka\BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Saleka\BibliothequeBundle\Entity\Oeuvre;

/**
 * MotCle
 *
 * @ORM\Table(name="mot_cle")
 * @ORM\Entity(repositoryClass="Saleka\BibliothequeBundle\Repository\MotCleRepository")
 */
class MotCle
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
     * @ORM\Column(name="tag", type="string", length=255)
     */
    private $tag;

    /**
     * @var
     *
     * @ORM\ManyToMany(targetEntity="Saleka\BibliothequeBundle\Entity\Oeuvre", mappedBy="motCles")
     */
    private $oeuvres;


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
     * Set tag
     *
     * @param string $tag
     *
     * @return MotCle
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->oeuvres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add oeuvre
     *
     * @param Oeuvre $oeuvre
     *
     * @return MotCle
     */
    public function addOeuvre(Oeuvre $oeuvre)
    {
        $this->oeuvres[] = $oeuvre;

        return $this;
    }

    /**
     * Remove oeuvre
     *
     * @param Oeuvre $oeuvre
     */
    public function removeOeuvre(Oeuvre $oeuvre)
    {
        $this->oeuvres->removeElement($oeuvre);
    }

    /**
     * Get oeuvres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOeuvres()
    {
        return $this->oeuvres;
    }

    public function __toString()
    {
        return $this->getTag();
    }
}
