<?php
namespace KayStrobach\Tags\Domain\Model;

/*
 * This file is part of the SBS.LaPo package.
 */

use TYPO3\Flow\Annotations as Flow;
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
     * @return string
     */
    public function getName()
    {
        if (\is_string($this->name)) {
            return $this->name;
        }
        return '';
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
