<?php

namespace EmzKashi\Subscriber;

use Psr\Log\LoggerInterface;
use Shopware\Core\Framework\Context;
use Doctrine\DBAL\Connection;
use Shopware\Core\System\SalesChannel\Entity\SalesChannelRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Storefront\Page\Product\ProductPageLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EmzDetailPagetestSubscriber implements EventSubscriberInterface
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * @var SalesChannelRepositoryInterface
     */
    private $productRepository; 

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct (
        Connection $connection,
        SalesChannelRepositoryInterface $productRepository,
        LoggerInterface $logger
    ) {
        $this->connection = $connection;
        $this->productRepository = $productRepository;
        $this->logger = $logger;
    }
    
    public static function getSubscribedEvents(): array
    { 
        return [
            ProductPageLoadedEvent::class => 'addVariants'
        ];
    }

    public function addVariants(ProductPageLoadedEvent $Event) 
    {
        // dd($Event);
        $product = $Event->getPage()->getProduct();
        if (empty($productParentId = $product->getParentId())) {
            return;
        }

        $products = $this->getVariantsOfProduct($productParentId, $Event->getContext());
        $matchingVariants = $products->getElements();

        var_dump($matchingVariants);
    }
    

    public function getVariantsOfProduct(string $productParentId, Context $context): EntitySearchResult
    {
        if (!empty($parentId)) { 
            $criteria = new Criteria();
            $criteria->addFilter(new EqualsFilter('parentId', $productParentId));

            $variants = $this->productRepository->search($criteria, $parentId->getSalesChannelContext())
                ->getEntities();

            $context->addExtension('emzVariant', $variants);
        }
        return $this->productRepository->search($criteria, $variants, $context);
    }
}