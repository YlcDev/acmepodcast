<?php

namespace App\Controller\Admin;

use App\Form\PodcastType;
use App\Repository\PodcastRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PodcastController extends Controller
{
    /**
     * @Route("/admin/podcast", name="podcast")
     *
     * @Method({"POST", "GET"})
     */
    public function index(Request $request, PodcastRepository  $repository)
    {
        $podcast = $repository->find(1);

        $form = $this->createForm(PodcastType::class, $podcast);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $repository->update($podcast);
        }

        return $this->render('admin/podcast/main.html.twig', ['form' => $form->createView()]);
    }
}
