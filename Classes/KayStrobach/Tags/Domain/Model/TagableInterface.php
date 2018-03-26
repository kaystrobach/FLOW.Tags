<?php
/**
 * Created by kay.
 */

namespace KayStrobach\Tags\Domain\Model;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

interface TagableInterface
{
    /**
     * @return \Doctrine\Common\Collections\Collection<\KayStrobach\Tags\Domain\Model\Tag>
     */
    public function getTags();

    /**
     * @param \Doctrine\Common\Collections\Collection<\KayStrobach\Tags\Domain\Model\Tag> $tags
     * @return void
     */
    public function setTags(Collection $tags);

    /**
     * @param Tag $tag
     * @return void
     */
    public function addTag(Tag $tag);

    /**
     * @param Tag $tag
     * @return void
     */
    public function removeTag(Tag $tag);

    /**
     * @param Tag $tag
     * @return bool
     */
    public function hasTag(Tag $tag);
}