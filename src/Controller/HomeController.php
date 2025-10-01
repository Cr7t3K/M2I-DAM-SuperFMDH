<?php

namespace App\Controller;

use App\Repository\ListingRepository;
use App\Trait\ListingsTrait;
use phpDocumentor\Reflection\Types\Self_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route(
        '/',
        name: 'app_home'
    )]
    public function index(
        ListingRepository $listingRepository,
    ): Response
    {
        $listings = $listingRepository->findAll();

        return $this->render('home/index.html.twig', [
            'houses' => $listings,
            'apartments' => $listings,
        ]);
    }
}
