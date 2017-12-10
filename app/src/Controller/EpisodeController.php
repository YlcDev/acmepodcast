<?php

namespace App\Controller;

use App\Form\CategoryType;
use App\Form\EpisodeType;
use App\Repository\EpisodeRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class EpisodeController extends Controller
{
    private $repository;

    public function __construct(EpisodeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/admin/episode", name="episode")
     *
     * @Method({"GET"})
     */
    public function index(Request $request)
    {
        $episodes = $this->repository->findAll();

        return $this->render('admin/episode/main.html.twig', ['episodes' => $episodes ]);
    }

    /**
     * @Route("/admin/episode/create/{episodeId}", name="episode.create")
     *
     * @Method({"POST", "GET"})
     */
    public function create(Request $request, ?string $episodeId = null)
    {
        $episode = $this->repository->findOrCreate($episodeId);

        $form = $this->createForm(EpisodeType::class, $episode);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->repository->update($episode);
        }

        return $this->render('admin/episode/create.html.twig', ['form' => $form->createView()]);
    }
}
