<?php declare(strict_types=1);

namespace EmzKashi\Subscriber;

use Psr\Log\LoggerInterface;
use Doctrine\DBAL\Connection;
use Shopware\Core\System\SalesChannel\Entity\SalesChannelRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Event\EntityLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Shopware\Core\Content\Product\ProductEvents;
use Shopware\Storefront\Page\Product\ProductPageLoadedEvent;
use Shopware\Core\Checkout\Customer\CustomerEvents;
use Shopware\Core\System\SalesChannel\SalesChannelContext;

class KashisSubscriber implements EventSubscriberInterface
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
            SalesChannelContext::class => 'onProductsLoaded',
            ProductPageLoadedEvent::class => [
                ['onProductPageLoaded', 9999]
            ],
            CustomerEvents::CUSTOMER_WRITTEN_EVENT => 'addCustomervisit',
            EntityLoadedEvent::class => 'onEntityLoadedEvent'
        ];
    }

    public function onProductsLoaded(SalesChannelContext $event)
    {
        // dd($event); 
    }

    public function onProductPageLoaded(ProductPageLoadedEvent $Event) 
    {  
         try {
            $page = $Event->getPage();
            $product = $page->getProduct();

     } catch (\Exception $e) {
         $errorMessage = "Caught Exception " . $e->getMessage() . "\r\n";
         $errorMessage .= "Error Source: " . $e->getTraceAsSt;

         $this->logger->error($errorMessage);
     }
    }

    public function addCustomField(CustomerEvents $e )
    {
    dd($e->$e());
                                
    }

}