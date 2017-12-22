<?php

namespace App\Controller\Admin;

use App\Form\SettingType;
use App\Repository\SettingRepository;
use App\Service\SettingService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends AbstractController
{
    /**
     * @Route("/admin/settings", name="settings")
     */
    public function index(Request $request, SettingRepository $repository)
    {
        $settings = $repository->get();

        $form = $this->createForm(SettingType::class, $settings);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $repository->update($settings);
        }

        return $this->render('admin/setting/main.html.twig', ['form' => $form->createView() ]);
    }
}
