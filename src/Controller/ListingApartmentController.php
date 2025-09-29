<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ListingApartmentController extends AbstractController
{
    #[Route(
        path: '/listings/apartments',
        name: 'listing_apartment',
        methods: ['GET']
    )]
    public function index(): Response
    {
        return $this->render('listing_apartment/index.html.twig', [
            'controller_name' => 'ListingApartmentController',
        ]);
    }
}
