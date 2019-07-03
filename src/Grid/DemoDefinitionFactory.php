<?php

namespace FOP\Doctrine\Grid;

use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;
use PrestaShop\PrestaShop\Core\Grid\Definition\Factory\AbstractGridDefinitionFactory;

final class DemoDefinitionFactory extends AbstractGridDefinitionFactory
{
    /**
     * {@inheritdoc}
     */
    protected function getId()
    {
        return 'demo_entity';
    }

    /**
     * {@inheritdoc}
     */
    protected function getName()
    {
        return 'Demo Entity';
    }

    /**
     * {@inheritdoc}
     */
    protected function getColumns()
    {
        return new ColumnCollection();
    }
}
