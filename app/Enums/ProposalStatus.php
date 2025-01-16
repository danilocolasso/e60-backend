<?php

namespace App\Enums;

enum ProposalStatus: string
{
    case IN_PROGRESS = 'in_progress';
    case REJECTED = 'rejected';
    case APPROVED = 'approved';
}
