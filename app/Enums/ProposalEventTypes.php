<?php

namespace App\Enums;

enum ProposalEventTypes: string
{
    const DEFAULT = 'default';
    const DEFAULT_UNIT = 'default_unit';
    const CUSTOM = 'custom';
    const CUSTOM_DEFAULT = 'custom_default';
}
