<?php

namespace App\Controller\Admin;

use App\Form\CategoryType;
use App\Form\TagType;
use App\Repository\CategoryRepository;
use App\Repository\TagRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class TagController extends AbstractController
{
    private $repository;

    public function __construct(TagRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/admin/tag", name="tag")
     *
     * @Method({"GET"})
     */
    public function index(Request $request)
    {
        $tags = $this->repository->findAll();

        return $this->render('admin/tag/main.html.twig', ['tags' => $tags ]);
    }

    /**
     * @Route("/admin/tag/create/{tagId}", name="tag.create")
     *
     * @Method({"POST", "GET"})
     */
    public function create(Request $request, ?string $tagId= null)
    {
        $tag = $this->repository->findOrCreate($tagId);

        $form = $this->createForm(TagType::class, $tag);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->repository->update($tag);
        }

        return $this->render('admin/tag/create.html.twig', ['form' => $form->createView()]);
    }
}
