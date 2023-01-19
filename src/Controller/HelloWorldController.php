<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HelloWorldController extends AbstractController
{
    #[Route('/', name: 'app_hello_world')]
    public function index(HttpClientInterface $client): Response
    {
        
        return $this->render('hello_world/index.html.twig', [
            'citation' => $client->request('GET', 'https://kaamelott.chaudie.re/api/random')->toArray(),
        ]);
    }
}
