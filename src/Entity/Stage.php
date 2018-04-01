<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StageRepository")
 */
class Stage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="Eleve")
     * @ORM\JoinColumn(name="idEleve", referencedColumnName="id")
     */
    private $Eleve;

    /**
     * @ORM\ManyToOne(targetEntity="Tuteur")
     * @ORM\JoinColumn(name="idTuteur", referencedColumnName="id")
     */
    private $Tuteur;

    /**
     * @ORM\Column(type="string")
     */
    private $dateAjout;

    /**
     * @return mixed
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * @param mixed $dateAjout
     */
    public function setDateAjout($dateAjout): void
    {
        $this->dateAjout = $dateAjout;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEleve()
    {
        return $this->Eleve;
    }

    /**
     * @param mixed $Eleve
     */
    public function setEleve($Eleve): void
    {
        $this->Eleve = $Eleve;
    }

    /**
     * @return mixed
     */
    public function getTuteur()
    {
        return $this->Tuteur;
    }

    /**
     * @param mixed $Tuteur
     */
    public function setTuteur($Tuteur): void
    {
        $this->Tuteur = $Tuteur;
    }



}
