<?php

namespace App\Controller;

use App\Trait\ListingsTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ListingHouseController extends AbstractController
{
    use ListingsTrait;

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
    public function show(int $id): Response
    {
        dd(self::HOUSES[$id - 1]);
    }
}
