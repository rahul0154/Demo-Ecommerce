<?php

namespace App\Controller\admin;

use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;


class DashboardController extends AbstractController
{

    public function __construct(
        private Security $security
    ){
    }


    #[Route('/admin', name: 'admin_dashboard')]
    public function dashboard(Request $request, ProductsRepository $productsRepository): Response
    {
        $user = $this->security->getUser();

        return $this->render('admin/dashboard.html.twig', [
            'username' => $user->getUsername(),
            'products' => $productsRepository->findAll(),
        ]);
    }
}
