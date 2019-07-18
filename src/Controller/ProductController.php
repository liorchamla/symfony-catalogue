<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use App\Entity\Product;

class ProductController extends AbstractController
{
    /**
     * @Route("/{category_slug}/{slug}", name="product_show")
     */
    public function index(Product $product)
    {
        return $this->render('product/show.html.twig', [
            'product' => $product
        ]);
    }
}
