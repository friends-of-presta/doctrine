<?php

namespace FOP\Doctrine\Controller;

use FOP\Doctrine\Grid\DemoFilters;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class GridController extends FrameworkBundleAdminController
{
    /**
     * @Route("/grid", methods={"GET", "POST"}, name="doctrine_demo_grid", defaults={
     *     "_legacy_controller": "AdminDoctrineGridClass",
     *     "_legacy_link": "AdminDoctrineGridClass"
     *     })
     *
     * @param DemoFilters $filters
     *
     * @return Response
     */
    public function renderGrid(DemoFilters $filters)
    {
        $demoGrid = $this->get('doctrine_demo.grid_factory')->getGrid($filters);

        return $this->render('@Modules/doctrine/views/grid.html.twig', [
            'layoutTitle' => 'Controller exemple (Grid)',
            'demoGrid' => $this->presentGrid($demoGrid),
        ]);
    }
}
