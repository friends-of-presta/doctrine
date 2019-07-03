<?php

namespace FOP\Doctrine\Grid;

use PrestaShop\PrestaShop\Core\Search\Filters;

final class DemoFilters extends Filters
{
    /**
     * {@inheritdoc}
     */
    public static function getDefaults()
    {
        return [
            'limit' => 10,
            'offset' => 0,
            'orderBy' => 'id',
            'sortOrder' => 'desc',
            'filters' => [],
        ];
    }
}
