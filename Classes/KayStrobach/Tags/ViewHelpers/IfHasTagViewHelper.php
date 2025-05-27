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
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;


class IfHasTagViewHelper extends AbstractConditionViewHelper
{
    /**
     * Initializes the "then" and "else" arguments
     */
    public function initializeArguments()
    {
        $this->registerArgument('then', 'mixed', 'Value to be returned if the condition if met.', false);
        $this->registerArgument('else', 'mixed', 'Value to be returned if the condition if not met.', false);

        $this->registerArgument('tag', 'mixed', 'Value to be returned if the condition if not met.', true);
        $this->registerArgument('object', 'mixed', 'Value to be returned if the condition if not met.', true);
    }

    /**
     * renders <f:then> child if access to the given resource is allowed, otherwise renders <f:else> child.
     *
     * @return string the rendered then/else child nodes depending on the access
     * @api
     */
    public function render()
    {
        if (static::evaluateCondition($this->arguments, $this->renderingContext)) {
            return $this->renderThenChild();
        }

        return $this->renderElseChild();
    }

    protected static function evaluateCondition($arguments, RenderingContextInterface $renderingContext): bool
    {
        return self::hasTag($arguments['object'], $arguments['tag']);
    }

    /**
     * @param object $object
     * @param Tag|string $tag
     * @return string
     */
    public static function hasTag($object, $tag): bool
    {
        if ($tag instanceof Tag) {
            $tagObject = $tag;
        } elseif(is_string($tag)) {
            $tagObject = new Tag();
            $tagObject->setName($tag);
        }

        if (($object instanceof TagableInterface) && $object->hasTag($tagObject)) {
            return true;
        }
        return false;
    }
}
