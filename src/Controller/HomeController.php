<?php

namespace App\Controller;

use App\Trait\ListingsTrait;
use phpDocumentor\Reflection\Types\Self_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    use ListingsTrait;

    #[Route(
        '/',
        name: 'app_home'
    )]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'houses' => self::HOUSES,
            'apartments' => self::APARTMENTS,
        ]);
    }
}
