<?php

namespace App\Enums;

enum ProposalTypes: string
{
    const CORPORATE = 'corporate';
    const PARTY = 'party';
    const SPECIAL = 'special';
    const COURTESY = 'courtesy';
    const ONLINE_HAPPY_HOUR = 'online_happy_hour';
    const ONLINE_PARTY = 'online_party';
    const EDUCATIONAL = 'educational';
}
