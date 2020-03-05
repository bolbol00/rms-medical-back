<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Presentation
 *
 * @ORM\Table(name="presentation")
 * @ORM\Entity
 */
class Presentation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="territories", type="text", length=0, nullable=false)
     */
    private $territories;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="presentations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $presentationCreator;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Project", inversedBy="presentations")
     */
    private $project;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Media", inversedBy="presentations")
     */
    private $Media;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Product", inversedBy="presentations")
     */
    private $product;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Referance", inversedBy="presentations")
     */
    private $referance;

    public function __construct()
    {
        $this->project = new ArrayCollection();
        $this->Media = new ArrayCollection();
        $this->product = new ArrayCollection();
        $this->referance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getTerritories(): ?string
    {
        return $this->territories;
    }

    public function setTerritories(string $territories): self
    {
        $this->territories = $territories;

        return $this;
    }

    public function getPresentationCreator(): ?Users
    {
        return $this->presentationCreator;
    }

    public function setPresentationCreator(?Users $presentationCreator): self
    {
        $this->presentationCreator = $presentationCreator;

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProject(): Collection
    {
        return $this->project;
    }

    public function addProject(Project $project): self
    {
        if (!$this->project->contains($project)) {
            $this->project[] = $project;
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->project->contains($project)) {
            $this->project->removeElement($project);
        }

        return $this;
    }

    /**
     * @return Collection|Media[]
     */
    public function getMedia(): Collection
    {
        return $this->Media;
    }

    public function addMedium(Media $medium): self
    {
        if (!$this->Media->contains($medium)) {
            $this->Media[] = $medium;
        }

        return $this;
    }

    public function removeMedium(Media $medium): self
    {
        if ($this->Media->contains($medium)) {
            $this->Media->removeElement($medium);
        }

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->product->contains($product)) {
            $this->product->removeElement($product);
        }

        return $this;
    }

    /**
     * @return Collection|Referance[]
     */
    public function getReferance(): Collection
    {
        return $this->referance;
    }

    public function addReferance(Referance $referance): self
    {
        if (!$this->referance->contains($referance)) {
            $this->referance[] = $referance;
        }

        return $this;
    }

    public function removeReferance(Referance $referance): self
    {
        if ($this->referance->contains($referance)) {
            $this->referance->removeElement($referance);
        }

        return $this;
    }


}