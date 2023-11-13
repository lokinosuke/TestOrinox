<?php
// src/Controller/ProductController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Service\ProductDataManager;

class ProductController extends AbstractController
{
    private $productDataManager;

    public function __construct(ProductDataManager $productDataManager)
    {
        $this->productDataManager = $productDataManager;
    }

    #[Route('/api/products', name: 'api_products')]
    public function getProducts(): JsonResponse
    {
        $products = $this->productDataManager->loadData();

        return $this->json($products);
    }
    #[Route('/api/product/{id}', name: 'api_product_detail')]
    public function getProductDetail($id): JsonResponse
    {
        $products = $this->productDataManager->loadData();

        $product = null;
        foreach ($products as $p) {
            if ($p['id'] == $id) {
                $product = $p;
                break;
            }
        }

        if ($product === null) {
            // Handle not found, for example, return a 404 response
            return $this->json(['error' => 'Product not found'], 404);
        }

        return $this->json($product);
    }

    # display all the products
    #[Route('/products', name: 'products')]
    public function displayProducts(): Response
    {
        $products = $this->productDataManager->loadData();

        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }

    # display the product detail
    #[Route('/product/{id}', name: 'product_details')]
    public function displayProductDetail($id): Response
    {
        $products = $this->productDataManager->loadData();

        $product = null;
        foreach ($products as $p) {
            if ($p['id'] == $id) {
                $product = $p;
                break;
            }
        }

        if ($product === null) {
            // Handle not found, for example, return a 404 response
            return $this->render('product/not_found.html.twig', [
                'id' => $id,
            ]);
        }

        return $this->render('product/details.html.twig', [
            'product' => $product,
        ]);
    }
}
