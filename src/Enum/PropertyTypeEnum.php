<?php

namespace App\Enum;

enum PropertyTypeEnum: string
{
    case HOUSE = 'House';
    case APARTMENT = 'Apartment';
    case LAND = 'Land';
    case VILLA = 'Villa';
    case LOFT = 'Loft';
    case FARM = 'Farm';
    case STUDIO = 'Studio';
    case COMMERCIAL = 'Commercial';
    case BUILDING = 'Building';
}
