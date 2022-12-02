<?php declare(strict_types=1);

namespace EmzKashi\Core\Content\EmzFakeSubCategory;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

class EmzFakeSubCategoryCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return EmzFakeSubCategoryEntity::class;
    }
}
