<?php

namespace App\Enums;

enum BookingTypes: string
{
    const SINGLE = 'single';
    const CORPORATE = 'corporate';
    const COURTESY = 'courtesy';
    const DELIVERY = 'delivery';
    const SPECIAL = 'special';
    const PARTY = 'party';
    const ONLINE_PARTY = 'online_party';
    const ONLINE_HAPPY_HOUR = 'online_happy_hour';
    const PRESS = 'press';
    const ONLINE = 'online';
    const EDUCATIONAL = 'educational';
}
