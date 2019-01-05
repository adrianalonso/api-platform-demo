<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * Department is an area where employee works
 *
 * @ApiResource(
 *     normalizationContext={"groups"={"department:read"}},
 *     denormalizationContext={"groups"={"department:write"}},
 *
 * )
 * @ORM\Entity
 */
class Department
{
    /**
     * @var int The entity Id
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"department:read"})
     */
    private $id;

    /**
     * @var string Employee Name
     *
     * @ORM\Column
     * @Assert\NotBlank
     * @Groups({"employee:read","department:read", "department:write"})
     */
    public $name = '';

    /**
     * @var Employee[] Employees associates to department
     *
     * @ORM\OneToMany(targetEntity="Employee", mappedBy="department")
     * @MaxDepth(2)
     */
    public $employees;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
    }


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
     * @return Employee[]
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * @param Employee[] $employees
     */
    public function setEmployees(array $employees): void
    {
        $this->employees = $employees;
    }
}
