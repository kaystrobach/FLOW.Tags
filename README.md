# Small FLOW package which provides Tagging for objects

```$html
{namespace ks=KayStrobach/Tags/ViewHelpers}

<ks:ifHasTag object="{object}" tag="{tag}">
    <f:then>
        ...
    </f:then>
    <f:else>
        ...
    </f:else>
</ks:ifHasTag>
```

The Tagging is provided via

* an Tag Model
* a TagableInterface
* a TagableTrait

having all these helper you can add tagging in the matter of minutes

Currently there is no interface for adding tags. Please use the DB.

## How to make your Entity tagable

```$php

use KayStrobach\Tags\Domain\Model\TagableTrait;

/**
 * @Flow\Entity
 */
class Entity implements TagableInterface
{

    use TagableTrait;
    
    public function __construct()
    {
        $this->initTags();
    }
}

```