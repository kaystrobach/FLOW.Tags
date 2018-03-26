<?php
namespace KayStrobach\Tags\ViewHelpers;

/*
 * This file is part of the TYPO3.Fluid package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use KayStrobach\Tags\Domain\Model\Tag;
use KayStrobach\Tags\Domain\Model\TagableInterface;
use TYPO3\Fluid\Core\ViewHelper\AbstractConditionViewHelper;


class IfHasTagViewHelper extends AbstractConditionViewHelper
{
    /**
     * @param object $object
     * @param Tag|string $tag
     * @return string
     */
    public function render($object, $tag)
    {
        if (!($tag instanceof Tag))
        {
            $tag = new Tag();
            $tag->setName($tag);
        }
        if ($object instanceof TagableInterface) {
            if ($object->hasTag($tag)) {
                return $this->renderThenChild();
            }
            return $this->renderElseChild();
        }
        return $this->renderElseChild();
    }
}
