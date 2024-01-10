<?php

namespace App\Controller;

use App\Repository\OrderRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;



class OrdersController extends AbstractController
{
    #[Route('/api/order', methods: ['GET'])]

    public function getAll(UserRepository $userRepository): JsonResponse
    {
        $user = $this->getUser();
        $retrievedUser = $userRepository->find($user);

        // Vérifiez si l'utilisateur est un client
        if ($retrievedUser instanceof \App\Entity\Customer) {
            $orders = $retrievedUser->getOrders();

            return $this->json(['orders' => $orders]);
        } else {
            return $this->json(['message' => 'pas reconnu comme un client']);
        }
    }
}
