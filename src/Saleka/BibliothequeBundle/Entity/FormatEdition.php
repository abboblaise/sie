<?php

namespace Saleka\BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormatEdition
 *
 * @ORM\Table(name="format_edition")
 * @ORM\Entity(repositoryClass="Saleka\BibliothequeBundle\Repository\FormatEditionRepository")
 */
class FormatEdition
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
     * @ORM\Column(name="intitule", type="string", length=255)
     */
    private $intitule;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=4)
     */
    private $extension;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Saleka\BibliothequeBundle\Entity\NatureEdition", inversedBy="formatEditions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $natureEdition;

    /**
     * @return mixed
     */
    public function getNatureEdition()
    {
        return $this->natureEdition;
    }

    /**
     * @param mixed $natureEdition
     */
    public function setNatureEdition($natureEdition)
    {
        $this->natureEdition = $natureEdition;
    }


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
     * Set intitule
     *
     * @param string $intitule
     *
     * @return FormatEdition
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return string
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set extension
     *
     * @param string $extension
     *
     * @return FormatEdition
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    public function __toString()
    {
        if ($this->getIntitule() == null)
            return "";
        else
            return $this->getIntitule();
    }
}

