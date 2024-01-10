<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\OrderRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
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
    #[Route('/order/get-by-customer/{customerNumber}', name: 'get_customer_orders', methods: ['GET'])]
    public function getOrdersByCustomerNumber(
        OrderRepository $orderRepository,
        string $customerNumber
    ) {
        $orders = $orderRepository->findOrdersByCustomerNumber($customerNumber);

        if (!$orders) {
            return new JsonResponse(['error' => 'No orders found for this client name.'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($orders, Response::HTTP_OK);
    }
}
