<?php

namespace App\Controller\List;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Category;
use App\Repository\MovieRepository;

class ListController extends AbstractController
{

    #[Route(path: '/lists', name: 'page_lists')]
    public function list(EntityManagerInterface $entityManager, CategoryRepository $categoryRepository): Response
    {

        return $this->render('others/lists.html.twig');
    }

}