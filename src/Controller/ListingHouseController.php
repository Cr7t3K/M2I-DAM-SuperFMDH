<?php

namespace App\Controller;

use App\Entity\Listing;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ListingHouseController extends AbstractController
{
    #[Route(
        path: '/listings/houses',
        name: 'app_listing_house',
        methods: ['GET']
    )]
    public function index(): Response
    {
        return $this->render('listing_house/index.html.twig', [
            'controller_name' => 'ListingHouseController',
        ]);
    }

    #[Route(
        path: '/listings/houses/{id}',
        name: 'app_listing_house_show',
        requirements: ['id' => '\d+'],
    )]
    public function show(Listing $listing): Response
    {
        dd($listing);
    }
}
