<?php

namespace App\Controller;

use App\Repository\DeliveryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    // récupérer la liste des livraisons
    #[Route('/delivery', name: 'app_delivery', methods: ['GET'])]
    public function getDelivery(DeliveryRepository $deliveryRepository)
    {
        $data = $deliveryRepository->findAll();
        return $this->json(['data' => $data]);
    }
}
