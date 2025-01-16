<?php

namespace App\Enums;

enum ProposalStatus: string
{
    const IN_PROGRESS = 'in_progress';
    const REJECTED = 'rejected';
    const APPROVED = 'approved';
}
