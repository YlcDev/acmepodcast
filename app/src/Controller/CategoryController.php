<?php

namespace App\Controller;

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
     * @Route("/admin/category/create/{categoryId}", name="category")
     *
     * @Method({"POST", "GET"})
     */
    public function create(string $categoryId)
    {
        $category = $this->repository->findOrCreate($categoryId);


    }
}
