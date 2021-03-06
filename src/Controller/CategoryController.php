<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use App\Entity\Category;

class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="category_index")
     */
    public function index(CategoryRepository $repo)
    {
        return $this->render('category/index.html.twig', [
            'categories' => $repo->findAll(),
        ]);
    }

    /**
     * @Route("/{slug}", name="category_show")
     */
    public function show(Category $category)
    {
        return $this->render('category/show.html.twig', [
            'category' => $category
        ]);
    }
}
