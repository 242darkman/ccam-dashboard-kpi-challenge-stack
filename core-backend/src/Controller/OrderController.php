<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
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
    #[Route('/orders/get-by-customer', name: 'get_customer_orders', methods: ['GET'])]
    public function getOrdersByCustomerNumber(
        UserRepository $userRepository,
        Request $request
    ) {
        $user = $this->getUser();
        $retrievedUser = $userRepository->find($user);

        // Vérifiez si l'utilisateur est un client
        if ($retrievedUser instanceof \App\Entity\Customer) {

            // // Récupérer les paramètres de pagination de la requête
            // $page = $request->query->get('page', 1); // Page par défaut est 1
            // $limit = $request->query->get('limit', 10); // Taille de la page par défaut

            // // Calculer l'offset
            // $offset = ($page - 1) * $limit;

            // Récupérer les commandes avec pagination
            $data = $retrievedUser->getOrders(); // Supposant que getOrders supporte la pagination

            // // Récupérer le nombre total de commandes
            // $totalOrders = $userRepository->count([]);

            // $paginationData = [
            //     'currentPage' => $page,
            //     'pageSize' => $limit,
            //     'totalItems' => $totalOrders,
            //     'totalPages' => ceil($totalOrders / $limit),
            // ];

            return $this->json(
                [
                    'data' => $data,
                ],
                Response::HTTP_OK
            );
        }



        return $this->json(['message' => 'No orders found for this client name.'], Response::HTTP_NOT_FOUND);
    }
}
