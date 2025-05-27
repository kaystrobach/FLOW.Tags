<?php
/**
 * Created by kay.
 */

namespace KayStrobach\Tags\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

trait TagableTrait {
    /**
     * @ORM\ManyToMany
     * @var \Doctrine\Common\Collections\Collection<\KayStrobach\Tags\Domain\Model\Tag>
     */
    protected $tags;

    protected function initTags()
    {
        if ($this->tags === null) {
            $this->tags = new ArrayCollection();
        }
    }

    /**
     * @return \Doctrine\Common\Collections\Collection<\KayStrobach\Tags\Domain\Model\Tag>
     */
    public function getTags()
    {
        $this->initTags();
        return $this->tags;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection<\KayStrobach\Tags\Domain\Model\Tag> $tags
     * @return void
     */
    public function setTags(Collection $tags): void
    {
        $this->tags = $tags;
    }

    /**
     * @param Tag $tag
     * @return void
     */
    public function addTag(Tag $tag): void
    {
        $this->initTags();
        if ($this->hasTag($tag)) {
            return;
        }
        $this->tags->add($tag);
    }

    /**
     * @param Tag $tag
     * @return void
     */
    public function removeTag(Tag $tag): void
    {
        $this->initTags();
        $this->tags->removeElement($tag);
    }

    /**
     * @param Tag $tag
     * @return bool
     */
    public function hasTag(Tag $tag): bool
    {
        if ($this->tags->contains($tag)) {
            return true;
        }
        /** @var Tag $tagItem */
        foreach ($this->tags as $tagItem) {
            if ((string)$tagItem === (string)$tag) {
                return true;
            }
        }
        return false;
    }
}
