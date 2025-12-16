<?php

namespace KayStrobach\Tags\Traits;

use KayStrobach\Tags\Domain\Repository\TagRepository;
use Neos\Flow\Mvc\View\ViewInterface;

use Neos\Flow\Annotations as Flow;
trait TagsControllerTrait
{
    /**
     * @Flow\Inject
     * @var \KayStrobach\Tags\Domain\Repository\TagRepository
     */
    protected $tagRepository;

    protected function initializeTagsForView(ViewInterface $view): void
    {
        $view->assign(
            'tags',
            $this->tagRepository->findAll()
        );
    }
}
