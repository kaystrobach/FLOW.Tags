<?php
namespace KayStrobach\Tags\ViewHelpers;

/*
 * This file is part of the Neos.FluidAdaptor package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use KayStrobach\Tags\Domain\Model\Tag;
use KayStrobach\Tags\Domain\Model\TagableInterface;
use Neos\FluidAdaptor\Core\ViewHelper\AbstractConditionViewHelper;


class IfHasTagViewHelper extends AbstractConditionViewHelper
{
    /**
     * @param object $object
     * @param Tag|string $tag
     * @return string
     */
    public function render($object, $tag)
    {
        if ($tag instanceof Tag) {
            $tagObject = $tag;
        } else {
            $tagObject = new Tag();
            $tagObject->setName($tag);
        }
        if (($object instanceof TagableInterface) && $object->hasTag($tagObject)) {
            return $this->renderThenChild();
        }
        return $this->renderElseChild();
    }
}
