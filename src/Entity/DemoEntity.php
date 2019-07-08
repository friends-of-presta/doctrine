<?php

namespace FOP\Doctrine\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="FOP\Doctrine\Repository\DemoEntityRepository")
 */
final class DemoEntity
{
    /**
     * Based on the Product Id.
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=13)
     * @Assert\Isbn
     */
    private $isbn;

    /**
     * @ORM\Column(type="date")
     * @Assert\GreaterThanOrEqual("+1 day")
     */
    private $expirationDate;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min = 3, max = 600)
     */
    private $alternativeDescription;

    /**
     * @return mixed
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(?int $id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn(?string $isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate(): ?DateTime
    {
        return $this->expirationDate;
    }

    /**
     * @param mixed $expirationDate
     */
    public function setExpirationDate(?DateTime $expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * @return mixed
     */
    public function getAlternativeDescription(): ?string
    {
        return $this->alternativeDescription;
    }

    /**
     * @param mixed $alternativeDescription
     */
    public function setAlternativeDescription(?string $alternativeDescription)
    {
        $this->alternativeDescription = $alternativeDescription;
    }
}
