<?php

namespace App\Entity\Meta;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class ShowNameMeta
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 250)]
    #[Assert\Regex('~[a-Z]{1,}~')]
    #[Groups(['name'])]
    private string $name;

    #[Assert\Regex('~[0-9]{1,}~')]
    private ?int $number = null;

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
     * @return int|null
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @param int|null $number
     */
    public function setNumber(?int $number): void
    {
        $this->number = $number;
    }
}
