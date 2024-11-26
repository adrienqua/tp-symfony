<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\MediaRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(MediaRepository $mediaRepository): Response
    {
        $featured = $mediaRepository->findPopular(5);

        return $this->render('index.html.twig');
    }
}
