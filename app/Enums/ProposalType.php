<?php

namespace App\Enums;

enum ProposalType: string
{
    case CORPORATE = 'corporate';
    case PARTY = 'party';
    case SPECIAL = 'special';
    case COURTESY = 'courtesy';
    case ONLINE_HAPPY_HOUR = 'online_happy_hour';
    case ONLINE_PARTY = 'online_party';
    case EDUCATIONAL = 'educational';
}
