<?php
namespace KayStrobach\Tags\Domain\Model;

/*
 * This file is part of the SBS.LaPo package.
 */

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Tag
{
    /**
     * @Flow\Identity()
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $scope = '';

    /**
     * @var bool
     */
    protected $available = true;

    /**
     * @var string
     */
    protected $shortHand = '';

    /**
     * @var string
     */
    protected $iconIdentifier = '';

    /**
     * @var string
     */
    protected $colorCode = '';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name ?? '';
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name = null): void
    {
        $this->name = $name ?? '';
    }

    public function getNameScope(): string
    {
        if (!str_contains($this->getName(), '::')) {
            return '';
        }
        list($group, $name) = explode('::', $this->getName(), 2);
        return $group;
    }

    public function getNameWithoutScope(): string
    {
        if (!str_contains($this->getName(), '::')) {
            return $this->getName();
        }
        list($group, $name) = explode('::', $this->getName(), 2);
        return $name;
    }

    /**
     * @return string
     */
    public function getScope(): string
    {
        return $this->scope ?? '';
    }

    /**
     * @param string|null $scope
     */
    public function setScope(?string $scope = null): void
    {
        $this->scope = $scope ?? '';
    }

    /**
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->available ?? false;
    }

    /**
     * @param bool $available
     */
    public function setAvailable(?bool $available = null): void
    {
        $this->available = $available ?? false;
    }

    /**
     * @return string
     */
    public function getShortHand(): string
    {
        return $this->shortHand ?? '';
    }

    /**
     * @param string|null $shortHand
     */
    public function setShortHand(?string $shortHand = null): void
    {
        $this->shortHand = $shortHand ?? '';
    }

    /**
     * @return string
     */
    public function getIconIdentifier(): string
    {
        return $this->iconIdentifier ?? '';
    }

    /**
     * @param string|null $iconIdentifier
     */
    public function setIconIdentifier(?string $iconIdentifier = null): void
    {
        $this->iconIdentifier = $iconIdentifier ?? '';
    }

    /**
     * @return string
     */
    public function getColorCode(): string
    {
        return $this->colorCode ?? '';
    }

    /**
     * @param string|null $colorCode
     */
    public function setColorCode(?string $colorCode = null): void
    {
        $this->colorCode = $colorCode ?? '';
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
