<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Employee represents a Person on our Company
 *
 * @ApiResource(
 *     normalizationContext={"groups"={"employee:read"}, "enable_max_depth"=true},
 *     denormalizationContext={"groups"={"employee:write"}}
 * )
 * @ORM\Entity
 * @UniqueEntity("nif")
 */
class Employee
{
    /**
     * @var int The entity Id
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string Employee Name
     *
     * @ORM\Column
     * @Assert\NotBlank
     * @Groups({"employee:read", "employee:write"})
     */
    public $name = '';

    /**
     * @var string Employee Surname
     *
     * @ORM\Column
     * @Assert\NotBlank
     * @Groups({"employee:read", "employee:write"})
     */
    public $surname = '';

    /**
     * @var string National Identifier
     *
     * @ORM\Column
     * @Assert\NotBlank
     * @Groups({"employee:read", "employee:write"})
     */
    public $nif = '';

    /**
     * @var \DateTime Contract Date
     *
     * @ORM\Column(type="date")
     * @Assert\NotBlank
     * @Groups({"employee:read", "employee:write"})
     */
    public $contractDate = '';

    /**
     * @var Department Department where employee works
     *
     * @ORM\ManyToOne(targetEntity="Department", inversedBy="employees")
     * @Groups({"employee:read", "employee:write"})
     */
    public $department;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return \DateTime
     */
    public function getContractDate(): \DateTime
    {
        return $this->contractDate;
    }

    /**
     * @param \DateTime $contractDate
     */
    public function setContractDate(\DateTime $contractDate): void
    {
        $this->contractDate = $contractDate;
    }

    /**
     * @return string
     */
    public function getNif(): string
    {
        return $this->nif;
    }

    /**
     * @param string $nif
     */
    public function setNif(string $nif): void
    {
        $this->nif = $nif;
    }

    /**
     * @return Department
     */
    public function getDepartment(): Department
    {
        return $this->department;
    }

    /**
     * @param Department $department
     */
    public function setDepartment(Department $department): void
    {
        $this->department = $department;
    }
}
