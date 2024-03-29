<?php
namespace KayStrobach\Tags\Domain\Repository;

/*
 * This file is part of the SBS.LaPo package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Persistence\Repository;

/**
 * @Flow\Scope("singleton")
 */
class TagRepository extends Repository
{
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
