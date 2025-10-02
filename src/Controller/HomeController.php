<?php

namespace App\Controller;

use App\Enum\PropertyTypeEnum;
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
        $listingsHouse = $listingRepository->findByPropertyType(PropertyTypeEnum::HOUSE);
        $listingsApartment = $listingRepository->findByPropertyType(PropertyTypeEnum::APARTMENT);

        return $this->render('home/index.html.twig', [
            'houses' => $listingsHouse,
            'apartments' => $listingsApartment,
        ]);
    }
}
