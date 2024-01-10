<?php

namespace App\DTO;


class PlatDTO
{

    private ?int $id ;

    /**
     * @Assert\NotBlank(message="Le nom est obligatoire.")
     * @Assert\Length(
     *      min=2,
     *      max=255,
     *      minMessage="Le nom doit contenir au moins {{ limit }} caractères.",
     *      maxMessage="Le nom ne peut pas contenir plus de {{ limit }} caractères."
     * )
     */
    private ?string $nom ;
    /**
     * @var string|null
     * @Assert\NotBlank(message="Le champ catégorie est obligatoire.", groups={"creation"})
     * @Assert\Length(
     *      min=2,
     *      max=255,
     *      minMessage="La catégorie doit contenir au moins {{ limit }} caractères.",
     *      maxMessage="La catégorie ne peut pas contenir plus de {{ limit }} caractères.",
     *      groups={"creation"}
     * )
     */
    private ?string $categorie ;
    /**
        * @var float|null
        * @Assert\NotNull(message="Le champ prix est obligatoire.")
        @Assert\Range(
        *      min=10,
        *      max=10000,
        *      notInRangeMessage="Le prix doit être compris entre {{ min }} et {{ max }}.",
        * )*/
    private ?float $prix ;
    private array $jours = [];
    private array $ingredients = [];
    private ?int $tempsPreparation ;
    private ?string $image ;

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
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string|null $nom
     */
    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string|null
     */
    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    /**
     * @param string|null $categorie
     */
    public function setCategorie(?string $categorie): void
    {
        $this->categorie = $categorie;
    }

    /**
     * @return float|null
     */
    public function getPrix(): ?float
    {
        return $this->prix;
    }

    /**
     * @param float|null $prix
     */
    public function setPrix(?float $prix): void
    {
        $this->prix = $prix;
    }

    /**
     * @return array
     */
    public function getJours(): array
    {
        return $this->jours;
    }

    /**
     * @param array $jours
     */
    public function setJours(array $jours): void
    {
        $this->jours = $jours;
    }

    /**
     * @return array
     */
    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    /**
     * @param array $ingredients
     */
    public function setIngredients(array $ingredients): void
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return int|null
     */
    public function getTempsPreparation(): ?int
    {
        return $this->tempsPreparation;
    }

    /**
     * @param int|null $tempsPreparation
     */
    public function setTempsPreparation(?int $tempsPreparation): void
    {
        $this->tempsPreparation = $tempsPreparation;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }
}