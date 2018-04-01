<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntrepriseRepository")
 */
class Entreprise
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $nomEntreprise;

    /**
     * @ORM\Column(type="text")
     */
    private $villeEntreprise;

    /**
     * @ORM\Column(type="integer", length=5)
     */
    private $cpEntreprise;

    /**
     * @ORM\Column(type="text")
     */
    private $adresseEntreprise;

    /**
     * @ORM\Column(type="text")
     */
    private $mailEntreprise;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $telEntreprise;

    /**
     * @ORM\Column(type="text")
     */
    private $activiteEntreprise;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active=1;


    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }

    /**
     * @return mixed
     */
    public function getVilleEntreprise()
    {
        return $this->villeEntreprise;
    }

    /**
     * @return mixed
     */
    public function getCpEntreprise()
    {
        return $this->cpEntreprise;
    }

    /**
     * @return mixed
     */
    public function getAdresseEntreprise()
    {
        return $this->adresseEntreprise;
    }

    /**
     * @return mixed
     */
    public function getMailEntreprise()
    {
        return $this->mailEntreprise;
    }

    /**
     * @return mixed
     */
    public function getTelEntreprise()
    {
        return $this->telEntreprise;
    }

    /**
     * @return mixed
     */
    public function getActiviteEntreprise()
    {
        return $this->activiteEntreprise;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $nomEntreprise
     */
    public function setNomEntreprise($nomEntreprise): void
    {
        $this->nomEntreprise = $nomEntreprise;
    }

    /**
     * @param mixed $villeEntreprise
     */
    public function setVilleEntreprise($villeEntreprise): void
    {
        $this->villeEntreprise = $villeEntreprise;
    }

    /**
     * @param mixed $cpEntreprise
     */
    public function setCpEntreprise($cpEntreprise): void
    {
        $this->cpEntreprise = $cpEntreprise;
    }

    /**
     * @param mixed $adresseEntreprise
     */
    public function setAdresseEntreprise($adresseEntreprise): void
    {
        $this->adresseEntreprise = $adresseEntreprise;
    }

    /**
     * @param mixed $mailEntreprise
     */
    public function setMailEntreprise($mailEntreprise): void
    {
        $this->mailEntreprise = $mailEntreprise;
    }

    /**
     * @param mixed $telEntreprise
     */
    public function setTelEntreprise($telEntreprise): void
    {
        $this->telEntreprise = $telEntreprise;
    }

    /**
     * @param mixed $activiteEntreprise
     */
    public function setActiviteEntreprise($activiteEntreprise): void
    {
        $this->activiteEntreprise = $activiteEntreprise;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active): void
    {
        $this->active = $active;
    }



}
