<?php declare(strict_types=1);

namespace EmzKashi\Core\Content\EmzFakeSubCategory;

use Shopware\Core\Content\Media\MediaDefinition;
use Shopware\Core\Content\Category\CategoryDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IntField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;

class EmzFakeSubCategoryDefinition extends EntityDefinition
{
    public const ENTITY_NAME = "customer_visit_counter";

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return EmzFakeSubCategoryEntity::class;
    }

    public function getCollectionClass(): string
    {
        return EmzFakeSubCategoryCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),
            (new BoolField('active', 'active'))->addFlags(new Required()),
            (new StringField('custom_visit', 'customvisit'))->addFlags(new Required()),
            (new StringField('product_id', 'productId'))->addFlags(new Required()),
            (new StringField('customer_id', 'customer'))->addFlags(new Required()),

            new ManyToOneAssociationField('category', 'category_id', CategoryDefinition::class, 'id', false)
        ]);
    }
}
