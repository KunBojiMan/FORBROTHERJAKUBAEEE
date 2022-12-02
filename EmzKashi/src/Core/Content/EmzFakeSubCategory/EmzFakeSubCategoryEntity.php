<?php declare(strict_types=1);

namespace EmzKashi\Core\Content\EmzFakeSubCategory;

use Shopware\Core\Content\Category\CategoryEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class EmzFakeSubCategoryEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var bool
     */
    protected $active;

    /**
     * @var string
     */
    protected $customvisit;
    
    /**
     * @var string
     */
    protected $productId;

    /**
     * @var string
     */
    protected $customer;

    /**
     * @var string
     */
    protected $categoryId;

    /**
     * @var CategoryEntity
     */
    protected $category;

    
    public function getActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getCustomvisit(): string
    {
        return $this->customvisit;
    }

    public function setcCustomvisit(int $customvisit): void
    {
        $this->customvisit = $customvisit;
    }

    public function getProductId(): string
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getCustomer(): string
    {
        return $this->customer;
    }

    public function setCustomer(int $customer): void
    {
        $this->customer = $customer;
    }

    public function getCategoryId(): string
    {
        return $this->categoryId;
    }

    public function setCategoryId(string $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function getCategory(): CategoryEntity
    {
        return $this->category;
    }

    public function setCategory(CategoryEntity $category): void
    {
        $this->category = $category;
    }
}
