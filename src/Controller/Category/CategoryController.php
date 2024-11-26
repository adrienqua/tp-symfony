<?php

namespace App\Controller\Category;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Category;
use App\Repository\MovieRepository;

class CategoryController extends AbstractController
{

    #[Route(path: '/discover', name: 'page_discover')]
    public function discover(EntityManagerInterface $entityManager, CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();

        return $this->render('others/discover.html.twig',  ['categories' => $categories]);
    }

    #[Route(path: '/category/{id}', name: 'page_category_details')]
    public function categoryDetails(string $id, CategoryRepository $categoryRepository, Category $category, MovieRepository $movieRepository): Response
    {
        dump($id);
        //$category = $categoryRepository->find($id);

        return $this->render('others/category.html.twig',  ['category' => $category]);
    }

}