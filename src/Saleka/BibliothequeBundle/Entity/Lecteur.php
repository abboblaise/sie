<?php

namespace Saleka\BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lecteur
 *
 * @ORM\Table(name="lecteur")
 * @ORM\Entity(repositoryClass="Saleka\BibliothequeBundle\Repository\LecteurRepository")
 */
class Lecteur
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
     * @ORM\Column(name="nomLecteur", type="string", length=255)
     */
    private $nomLecteur;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Saleka\BibliothequeBundle\Entity\Lire", mappedBy="lecteur")
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
     * Set nomLecteur
     *
     * @param string $nomLecteur
     *
     * @return Lecteur
     */
    public function setNomLecteur($nomLecteur)
    {
        $this->nomLecteur = $nomLecteur;

        return $this;
    }

    /**
     * Get nomLecteur
     *
     * @return string
     */
    public function getNomLecteur()
    {
        return $this->nomLecteur;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Lecteur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lectures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add lecture
     *
     * @param \Saleka\BibliothequeBundle\Entity\Lire $lecture
     *
     * @return Lecteur
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
        if ($this->getNomLecteur() == null)
            return "";
        else return $this->getNomLecteur();
    }
}
