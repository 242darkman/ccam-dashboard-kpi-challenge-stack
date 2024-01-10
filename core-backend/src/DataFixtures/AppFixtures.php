<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Customer;
use App\Entity\Order;
use App\Entity\Delivery;
use App\Entity\Question;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        // Création des utilisateurs administrateurs
        $this->createAdmins($manager);

        // Création des utilisateurs clients et customers
        $this->createCustomersAndUsers($manager);

        // Création des commandes et livraisons
        $this->createOrdersAndDeliveries($manager);

        // Création des questions
        $this->createQuestions($manager);
    }

    private function createAdmins(ObjectManager $manager): void
    {
        // Liste des admins
        $admins = [
            ['lansana@rapidvax.com', 'ROLE_ADMIN', 'lansana', 'admin'],
            ['brandon@rapidvax.com', 'ROLE_ADMIN', 'brandon', 'admin'],
            ['erica@rapidvax.com', 'ROLE_ADMIN', 'erica', 'admin'],
            ['laura@rapidvax.com', 'ROLE_ADMIN', 'laura', 'admin'],
            ['mariama@rapidvax.com', 'ROLE_ADMIN', 'mariama', 'admin'],
            ['redouane@rapidvax.com', 'ROLE_ADMIN', 'redouane', 'admin'],
        ];

        foreach ($admins as $adminData) {
            $admin = new User();
            $admin->setEmail($adminData[0])
                ->setRoles([$adminData[1]])
                ->setPassword($this->passwordEncoder->hashPassword($admin, 'adminpass'))
                ->setUsername($adminData[2]);
            $manager->persist($admin);
        }

        $manager->flush();
    }

    private function createCustomersAndUsers(ObjectManager $manager): void
    {
        // Liste des customers et users
        $customers = [
            ['GlobalTech', 'contact@globaltech.com', 'globaltech_user'],
            ['InnovateInc', 'info@innovateinc.com', 'innovateinc_user'],
            ['AlphaSystems', 'contact@alphasystems.com', 'alphasystems_user'],
            ['BetaSolutions', 'info@betasolutions.com', 'betasolutions_user'],
            ['TechFrontiers', 'contact@techfrontiers.com', 'techfrontiers_user'],
            ['PharmaCore', 'contact@pharmacore.pharmaexample.com', 'pharmacore_user'],
            ['BioHealSolutions', 'info@biohealsolutions.pharmaexample.com', 'bioheal_user'],
            ['MediTechLabs', 'contact@meditechlabs.pharmaexample.com', 'meditech_user'],
            ['HealthGenics', 'info@healthgenics.pharmaexample.com', 'healthgenics_user'],
            ['CureSynthetics', 'contact@curesynthetics.pharmaexample.com', 'curesynth_user']
        ];


        foreach ($customers as $customerData) {
            $customer = new Customer();
            $customer->setName($customerData[0])
                ->setCustomerNumber($this->generateCustomerNumber($customerData[0]));
            $customer
                ->setEmail($customerData[1])
                ->setRoles(['ROLE_CLIENT'])
                ->setPassword($this->passwordEncoder->hashPassword($customer, 'clientpass'))
                ->setUsername($customerData[2]);

            $manager->persist($customer);
        }

        $manager->flush();
    }

    private function createOrdersAndDeliveries(ObjectManager $manager): void
    {
        // Statuts possibles pour les livraisons
        $deliveryStatuses = ['preparing', 'in_transit', 'out_for_delivery', 'delivered'];
        $dayTimes = ['nocturne', 'diurne'];
        $weekTimes = ['weekday', 'weekend'];

        // Récupérer tous les clients
        $customers = $manager->getRepository(Customer::class)->findAll();

        for ($i = 1; $i < 10490; $i++) {
            $order = new Order();
            $delivery = new Delivery();

            // Choisir un client aléatoire pour la commande
            $customer = $customers[array_rand($customers)];
            // Date de commande entre 1 Jan 2023 et 11 Jan 2024
            $orderedAt = new \DateTimeImmutable('2023-01-01 +' . rand(0, 365 * 24 * 60 * 60) . ' seconds');
            $order
                ->setCustomer($customer)
                ->setAmount(rand(5000, 100000))
                ->setOrderNumber('ORD' . str_pad((string)$i, 4, '0', STR_PAD_LEFT))
                ->setOrderedAt($orderedAt);

            $manager->persist($order);

            $delay = $delivery->getDistance() <= 500 ? 24 : 48;
            $deliveryExpected = clone $orderedAt;
            $deliveryExpected->modify('+' . $delay . ' hours');
            $deliveredAt = null;

            if ($i % 10 !== 1 || $delivery->getDistance() <= 500) {
                $deliveredAt = clone $deliveryExpected;
            }

            if ($i % 10 === 1 && $delivery->getDistance() <= 500) {
                $deliveredAt->modify('-5 hours'); // livrée tôt
            }
            if ($i % 10 === 1 && $delivery->getDistance() > 500) {
                $deliveredAt->modify('+8 hours'); // livrée tard
            }


            $delivery->setOrderId($order)
                ->setDistance(rand(1, 1000))
                ->setDeliveryNumber('DEL' . str_pad((string)$i, 4, '0', STR_PAD_LEFT))
                ->setDeliveredAt($deliveredAt)
                ->setDeliveryExpected($deliveryExpected)
                ->setDayTime($dayTimes[array_rand($dayTimes)])
                ->setWeekTime($weekTimes[array_rand($weekTimes)]);

            // Pour les 100 premières livraisons, assigner des statuts spécifiques
            if ($i < 100) {
                $delivery->setStatus($deliveryStatuses[array_rand($deliveryStatuses)]);
            }
            $delivery->setStatus('delivered');

            $manager->persist($delivery);
        }

        $manager->flush();
    }

    private function createQuestions(ObjectManager $manager): void
    {
        $questions = [
            'Êtes-vous satisfait de la rapidité de la livraison ?',
            'Recommanderiez-vous notre entreprise à vos amis ou à votre famille ?',
            'Êtes-vous satisfait de votre expérience avec notre entreprise ?'
        ];

        foreach ($questions as $qText) {
            $question = new Question();
            $question->setDescription($qText);
            $manager->persist($question);
        }

        $manager->flush();
    }

    private function generateCustomerNumber(string $name): string
    {
        return 'CLI' . str_pad((string)rand(0, 9999), 4, '0', STR_PAD_LEFT) . substr($name, 0, 2);
    }
}
