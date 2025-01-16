<?php

namespace App\Enums;

enum ProposalTypes: string
{
    case CORPORATE = 'corporate';
    case PARTY = 'party';
    case SPECIAL = 'special';
    case COURTESY = 'courtesy';
    case ONLINE_HAPPY_HOUR = 'online_happy_hour';
    case ONLINE_PARTY = 'online_party';
    case EDUCATIONAL = 'educational';
}
