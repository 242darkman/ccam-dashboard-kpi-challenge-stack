<?php

namespace App\Controller;

use App\Entity\ComplaintsAndReturns;
use App\Repository\DeliveryRepository;
use App\Repository\OrderRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeliveryController extends AbstractController
{
    /**
     * Undocumented function
     *
     * @param DeliveryRepository $deliveryRepository
     * @return void
     */
    #[Route('/delivery-by-delay', name: 'delivery_by_delay', methods: ['GET'])]
    public function getByDelai(DeliveryRepository $deliveryRepository)
    {
        $dataAll = $deliveryRepository->findAll();
        $dataDelay = $deliveryRepository->findByDelay();

        $countDataAll = count($dataAll);
        $countDataDelay = count($dataDelay);

        $delay = ($countDataAll > 0) ? $countDataDelay / $countDataAll : 0;
        $data = $delay * 100;

        return $this->json(['le % est ' => $data]);
    }


    #[Route('/delivery-by-advance', name: 'delivery_by_advance', methods: ['GET'])]
    public function getByAdvance(DeliveryRepository $deliveryRepository)
    {
        $dataAll = $deliveryRepository->findAll();
        $dataAdvance = $deliveryRepository->findByAdvance();

        $countDataAll = count($dataAll);
        $countDataAdvance = count($dataAdvance);

        $delay = ($countDataAll > 0) ? $countDataAdvance / $countDataAll : 0;
        $data = $delay * 100;

        return $this->json(['le % est' => $data]);
    }


    // récupérer la liste des livraisons par nuits
    #[Route('/delivery-by-diurne', name: 'delivery_by_diurne', methods: ['GET'])]
    public function getByDiune(DeliveryRepository $deliveryRepository)
    {
        $data = $deliveryRepository->findBy(["dayTime" => "diurne"]);
        return $this->json(['data' => $data]);
    }


    // Insertion des retours
    #[Route('/create', name: 'create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $manager, OrderRepository $orderRepository)
    {
        $data = json_decode($request->getContent(), true);
        $type = $data["type"];
        $order = $data["order"];
        $description = $data["description"];

        $orderId = $orderRepository->find($order);

        // Créez une nouvelle instance de ComplaintsAndReturns
        $complaint = new ComplaintsAndReturns();

        $complaint->setType($type);
        $complaint->setCreatedAt(new \DateTimeImmutable());
        $complaint->setDescription($description);
        //$complaint->setOrders($orderId);

        // Persistez l'entité dans la base de données
        $manager->persist($complaint);
        $manager->flush();

        // Retournez une réponse appropriée
        //return new Response('Complaint created successfully', Response::HTTP_CREATED);
        return $this->json([
            'Complaint created successfully', Response::HTTP_CREATED
        ]);
    }

    // récupérer la liste des livraisons
    #[Route('/delivery', name: 'app_delivery', methods: ['GET'])]
    public function getDelivery(DeliveryRepository $deliveryRepository)
    {
        $data = $deliveryRepository->findAll();
        return $this->json(['data' => $data]);
    }






    // récupérer la liste des livraisons
    // #[Route('/delivery22', name: 'app_delivery', methods: ['GET'])]
    // public function getDelivery(DeliveryRepository $deliveryRepository)
    // {

    //     $data = $deliveryRepository->findAll();
    //     $deliveryNumbers = array();

    //     foreach ($data as $delivery) {

    //         $deliveryNumbers[] = $delivery->getDeliveryNumber();
    //     }

    //     return $this->json(['deliveryNumbers' => $deliveryNumbers]);
    // }
}
