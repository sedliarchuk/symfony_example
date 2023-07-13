<?php

namespace App\Entity\Meta;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class ShowNameMeta
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 250)]
    #[Assert\Regex('~^[A-z]{1,}$~')]
    #[Groups(['name'])]
    private string $name;

    #[Assert\Regex('~^[0-9]{1,}$~')]
    private ?string $number = null;

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
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string|null $number
     */
    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }
}
