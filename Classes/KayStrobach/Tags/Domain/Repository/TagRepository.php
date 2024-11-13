<?php
namespace KayStrobach\Tags\Domain\Repository;

/*
 * This file is part of the SBS.LaPo package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Persistence\Repository;
use Neos\Flow\Persistence\QueryInterface;

/**
 * @Flow\Scope("singleton")
 */
class TagRepository extends Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'scope' => QueryInterface::ORDER_ASCENDING,
        'name' => QueryInterface::ORDER_ASCENDING
    ];
    
    public function findByScope(string $scope)
    {
        $q = $this->createQuery();
        $q->matching(
            $q->logicalAnd(
                [
                    $q->equals('scope', $scope),
                    $q->equals('available', true),
                ]
            )
        );
        return $q->execute();
    }
    // add customized methods here
}
