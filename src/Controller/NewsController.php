<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NewsController extends AbstractController
{
    #[Route('/news', name: 'app_news')]
    public function index(): Response
    {
        return $this->render('news/index.html.twig');
    }

    #[Route('/news/{id}', name: 'app_news_show')]
    public function show(int $id): Response
    {
        return $this->render('news/show.html.twig', ['id' => $id]);
    }
}

