<?php

namespace App\Enums;

enum ProposalEventTypes: string
{
    case DEFAULT = 'default';
    case DEFAULT_UNIT = 'default_unit';
    case CUSTOM = 'custom';
    case CUSTOM_DEFAULT = 'custom_default';
}
