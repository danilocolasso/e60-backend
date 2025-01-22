<?php

namespace App\Enums;

enum BookingType: string
{
    case SINGLE = 'single';
    case CORPORATE = 'corporate';
    case COURTESY = 'courtesy';
    case DELIVERY = 'delivery';
    case SPECIAL = 'special';
    case PARTY = 'party';
    case ONLINE_PARTY = 'online_party';
    case ONLINE_HAPPY_HOUR = 'online_happy_hour';
    case PRESS = 'press';
    case ONLINE = 'online';
    case EDUCATIONAL = 'educational';
}
