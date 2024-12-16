<?php

namespace App\Controller\Subscription;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Subscription;
use App\Repository\SubscriptionRepository;

class SubscriptionController extends AbstractController
{
    #[Route(path: '/subscription', name: 'page_subscription_details')]
    public function subscription(SubscriptionRepository $subscriptionRepository): Response
    {
        
        $subscriptions = $subscriptionRepository->findAll();

        return $this->render('others/abonnements.html.twig', [
            'subscriptions' => $subscriptions,
        ]);
    }

}