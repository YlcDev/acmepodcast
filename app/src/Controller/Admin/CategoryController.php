<?php

namespace App\Controller\Admin;

use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class CategoryController extends AbstractController
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/admin/category", name="category")
     *
     * @Method({"GET"})
     */
    public function index(Request $request)
    {
        $categories = $this->repository->findAll();

        return $this->render('admin/category/main.html.twig', ['categories' => $categories ]);
    }

    /**
     * @Route("/admin/category/create/{categoryId}", name="category.create")
     *
     * @Method({"POST", "GET"})
     */
    public function create(Request $request, ?string $categoryId = null)
    {
        $category = $this->repository->findOrCreate($categoryId);

        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->repository->update($category);
        }

        return $this->render('admin/category/create.html.twig', ['form' => $form->createView()]);
    }
}
