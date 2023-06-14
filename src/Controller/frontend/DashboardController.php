<?php

namespace App\Controller\frontend;

use App\Entity\Products;
use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Asset\Package;
use function Symfony\Component\Console\Input\isArray;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;
use App\Service\DataTableService;


class DashboardController extends AbstractController
{

    #[Route('/', name: 'frontend_dashboard')]
    public function dashboard(Request $request, ProductsRepository $productsRepository, \Symfony\Component\Asset\Packages $assetsManager): Response
    {
        $session = $request->getSession();

        $currentCart = $session->get('userCart');

        $totalInCart = 0;
        if (is_array($currentCart) && count($currentCart) > 0) {
            foreach ($currentCart as $cProduct) {
                $totalInCart += $cProduct['qty'];
            }
        }

        $allProducts = $productsRepository->findAll();
        if (is_array($allProducts) && count($allProducts) > 0) {
            foreach ($allProducts as $cProduct) {
                if (!file_exists($cProduct->getProductImage())){
                    $cProduct->setProductImage($assetsManager->getUrl("asset/image/No-Image.png"));
                }
            }
        }


        return $this->render('frontend/dashboard.html.twig', [
            'total_in_cart' => $totalInCart,
            'products' => $allProducts
        ]);
    }

    #[Route('/cart', name: 'frontend_cart')]
    public function userCart(Request $request): Response
    {
        $session = $request->getSession();
        $currentCart = $session->get('userCart');

        $totalAmont = 0;
        if (is_array($currentCart) && count($currentCart) > 0) {
            foreach ($currentCart as $cProduct) {
                $totalAmont += intval($cProduct['qty']) * floatval($cProduct['price']);
            }
        }

        return $this->render('frontend/cart.html.twig', [
            'total_amount' => $totalAmont,
            'products' => $currentCart,
        ]);
    }

    #[Route('/cart/add/{id}', name: 'app_product_cart', methods: ['POST'])]
    public function addToCart(Request $request, Products $product, ProductsRepository $productsRepository): Response
    {
        $session = $request->getSession();

        $currentCart = $session->get('userCart');

        if (is_array($currentCart) && count($currentCart) > 0) {
            $currentCart[$product->getId()] = array(
                'id' => $product->getId(),
                'name' => $product->getProductName(),
                'image' => $product->getProductImage(),
                'partnumber' => $product->getPartNumber(),
                'price' => $product->getSellingPrice(),
                'qty' => 1,
            );
        } else {
            $currentCart = array();
            $currentCart[$product->getId()] = array(
                'id' => $product->getId(),
                'name' => $product->getProductName(),
                'image' => $product->getProductImage(),
                'partnumber' => $product->getPartNumber(),
                'price' => $product->getSellingPrice(),
                'qty' => 1,
            );
        }


        $session->set('userCart', $currentCart);

        return $this->redirectToRoute('frontend_dashboard', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/cart/remove/{id}', name: 'remove_product_cart', methods: ['POST'])]
    public function removeFromCart(Request $request, $id = null): Response
    {
        $session = $request->getSession();

        $currentCart = $session->get('userCart');

        if (isset($currentCart[$id])) {
            unset($currentCart[$id]);
            $session->set('userCart', $currentCart);
        }

        return new JsonResponse(["success" => true]);
    }

    #[Route('/cart/update/{id}/{qty}', name: 'update_product_cart', methods: ['POST'])]
    public function updateCartQty(Request $request, $id = null, $qty = 0): Response
    {
        $session = $request->getSession();

        $currentCart = $session->get('userCart');

        if (isset($currentCart[$id])) {
            $currentCart[$id]['qty'] = $qty;
            $session->set('userCart', $currentCart);
        }

        return new JsonResponse(["success" => true]);
    }
}
