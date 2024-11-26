<?php

namespace App\Controller\Subscription;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Subscription;

class SubscriptionController extends AbstractController
{
    #[Route(path: '/subscription/{id}', name: 'page_subscription_details')]
    public function movieDetails(Subscription $subscription): Response
    {
        return $this->render('others/abonnements.html.twig', ['subscription' => $subscription]);
    }

}