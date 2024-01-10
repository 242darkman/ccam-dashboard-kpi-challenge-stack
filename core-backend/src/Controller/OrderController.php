<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends AbstractController
{
    /**
     * Récupère les commandes associées à un nom d'utilisateur donné.
     *
     * @param OrderRepository $orderRepository L'objet repository des commandes.
     * @param string $clientName Le nom d'utilisateur de l'utilisateur.
     * @return Some_Return_Value La réponse JSON contenant les commandes.
     */
    #[Route('/order/get-by-customer', name: 'get_customer_orders', methods: ['GET'])]
    public function getOrdersByCustomerNumber(
        UserRepository $userRepository
    ) {
        $user = $this->getUser();
        $retrievedUser = $userRepository->find($user);

        // Vérifiez si l'utilisateur est un client
        if ($retrievedUser instanceof \App\Entity\Customer) {
            $orders = $retrievedUser->getOrders();

            return $this->json(['orders' => $orders]);
        }

        return $this->json(['message' => 'No orders found for this client name.'], Response::HTTP_NOT_FOUND);
    }
}
