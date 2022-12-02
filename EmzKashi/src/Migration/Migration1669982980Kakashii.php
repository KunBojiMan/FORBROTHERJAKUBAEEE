<?php declare(strict_types=1);

namespace EmzKashi\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1669982980Kakashii extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1669982980;
    }


    public function update(Connection $connection): void
    {
        $query = <<<SQL
CREATE TABLE IF NOT EXISTS `swag_basic_example_general_settings` (
    `id`                INT             NOT NULL,
    `customer_id`       VARCHAR(255)    NOT NULL,
    `customer_visit`    VARCHAR(255)    NOT NULL,
    `product_id`        VARCHAR(255)    NOT NULL,
    `active`            VARCHAR(255)    NOT NULL,
    PRIMARY KEY (id)
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
    }
}