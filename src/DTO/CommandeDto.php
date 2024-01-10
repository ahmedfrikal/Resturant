<?php

namespace App\DTO;

class CommandeDto
{
    private ?int $id = null;
    private ?int $platId = null;
    private ?string $platNom = null;
    private ?string $platImage = null;

    /**
     * @return string|null
     */
    public function getPlatImage(): ?string
    {
        return $this->platImage;
    }

    /**
     * @param string|null $platImage
     */
    public function setPlatImage(?string $platImage): void
    {
        $this->platImage = $platImage;
    }
    private ?int $employeId = null;
    private ?string $employeNom = null;
    private ?\DateTimeInterface $dateCommande = null;
    private ?float $total = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getPlatId(): ?int
    {
        return $this->platId;
    }

    /**
     * @param int|null $platId
     */
    public function setPlatId(?int $platId): void
    {
        $this->platId = $platId;
    }

    /**
     * @return string|null
     */
    public function getPlatNom(): ?string
    {
        return $this->platNom;
    }

    /**
     * @param string|null $platNom
     */
    public function setPlatNom(?string $platNom): void
    {
        $this->platNom = $platNom;
    }

    /**
     * @return int|null
     */
    public function getEmployeId(): ?int
    {
        return $this->employeId;
    }

    /**
     * @param int|null $employeId
     */
    public function setEmployeId(?int $employeId): void
    {
        $this->employeId = $employeId;
    }

    /**
     * @return int|null
     */
    public function getEmployeNom(): ?string
    {
        return $this->employeNom;
    }

    /**
     * @param int|null $employeNom
     */
    public function setEmployeNom(?string $employeNom): void
    {
        $this->employeNom = $employeNom;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    /**
     * @param \DateTimeInterface|null $dateCommande
     */
    public function setDateCommande(?\DateTimeInterface $dateCommande): void
    {
        $this->dateCommande = $dateCommande;
    }

    /**
     * @return float|null
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }

    /**
     * @param float|null $total
     */
    public function setTotal(?float $total): void
    {
        $this->total = $total;
    }



}