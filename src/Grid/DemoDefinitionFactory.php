<?php

namespace FOP\Doctrine\Grid;

use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\DateTimeColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\ActionColumn;
use PrestaShop\PrestaShop\Core\Grid\Definition\Factory\AbstractGridDefinitionFactory;
use PrestaShop\PrestaShop\Core\Grid\Action\Row\RowActionCollection;
use PrestaShop\PrestaShop\Core\Grid\Action\Row\Type\LinkRowAction;

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
        return $this->trans('Demo Entity', [], 'Modules.Doctrine.Admin');
    }

    /**
     * {@inheritdoc}
     */
    protected function getColumns()
    {
        $columns = new ColumnCollection();
        
        $columns
            ->add((new DataColumn('isbn'))
                ->setName($this->trans('ISBN', [], 'Modules.Doctrine.Admin'))
                ->setOptions([
                    'field' => 'isbn',
                ]))
            ->add((new DateTimeColumn('expiration_date'))
                ->setName($this->trans('Expiration date', [], 'Modules.Doctrine.Admin'))
                ->setOptions([
                    'field' => 'expiration_date',
                ]))
            ->add((new ActionColumn('actions'))
                ->setName($this->trans('Actions', [], 'Admin.Actions'))
                ->setOptions([
                    'actions' => $this->getRowActions(),
                ])
            )
            ;
        
        return $columns;
    }
    
    /**
     * Extracted row action definition into separate method.
     */
    private function getRowActions()
    {
        return (new RowActionCollection())
            ->add((new LinkRowAction('edit'))
                ->setName($this->trans('Edit', [], 'Admin.Actions'))
                ->setOptions([
                    'route' => 'doctrine_demo_form',
                    'route_param_name' => 'id',
                    'route_param_field' => 'id',
                ])
                ->setIcon('edit')
            )
            ;
    }
}
