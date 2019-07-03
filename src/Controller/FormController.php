<?php

namespace FOP\Doctrine\Controller;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use FOP\Doctrine\Form\DemoFormType;

final class FormController extends FrameworkBundleAdminController
{
    /**
     * @Route("/form", methods={"GET", "POST"}, name="doctrine_demo_form")
     */
    public function renderForm(Request $request)
    {
        $demoForm = $this->createForm(DemoFormType::class);

        if ($request->isMethod('POST')) {
            $demoForm->handleRequest($request);

            if ($demoForm->isSubmitted() && $demoForm->isValid()) {
                /** @var EntityManagerInterface $manager */
                $manager = $this->getDoctrine()->getManager();

                $manager->persist($demoForm->getData());
                $manager->flush();

                return $this->redirectToRoute('doctrine_demo_form');
            }
        }

        return $this->render('@Modules/doctrine/views/form.html.twig', [
            'layoutTitle' => 'Controller exemple (Form)',
            'demoForm' => $demoForm->createView(),
        ]);
    }
}
