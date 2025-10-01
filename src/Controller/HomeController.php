<?php

namespace App\Controller;

use App\Repository\ListingRepository;
use App\Repository\PropertyTypeRepository;
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
        PropertyTypeRepository $propertyTypeRepository,
        ListingRepository $listingRepository,
    ): Response
    {
        $housePropertyType = $propertyTypeRepository->findOneBy(['name' => 'House']);
        $apartmentPropertyType = $propertyTypeRepository->findOneBy(['name' => 'Apartment']);

        $listingsHouse = $listingRepository->findBy(['propertyType' => $housePropertyType]);
        $listingsApartment = $listingRepository->findBy(['propertyType' => $apartmentPropertyType]);

        return $this->render('home/index.html.twig', [
            'houses' => $listingsHouse,
            'apartments' => $listingsApartment,
        ]);
    }
}
