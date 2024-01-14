<?php

namespace App\DTO;

class ChiffreAffairesParMoisDTO
{
    private $nomEmploye;
    private $prenomEmploye;
    private $nombreCommandes;

    public function __construct($nomEmploye, $prenomEmploye, $nombreCommandes)
    {
        $this->nomEmploye = $nomEmploye;
        $this->prenomEmploye = $prenomEmploye;
        $this->nombreCommandes = $nombreCommandes;
    }

    public function getNomEmploye()
    {
        return $this->nomEmploye;
    }

    public function getPrenomEmploye()
    {
        return $this->prenomEmploye;
    }

    public function getNombreCommandes()
    {
        return $this->nombreCommandes;
    }

}