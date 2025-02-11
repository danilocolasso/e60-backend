<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proposal extends Model
{
    /** @use HasFactory<\Database\Factories\ProposalFactory> */
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'customer_id',
        'user_id',
        'monitor_user_id',
        'event_date',
        'type',
        'status',
        'return_date',
        'notes',
        'item_person_quantity',
        'item_room_quantity',
        'item_monitoring_quantity',
        'item_consultant_quantity',
        'item_waiter_quantity',
        'item_partykit_quantity',
        'item_coffee_quantity',
        'item_person_amount',
        'item_room_amount',
        'item_monitoring_amount',
        'item_consultant_amount',
        'item_waiter_amount',
        'item_partykit_amount',
        'item_coffee_amount',
        'item_other_amount',
        'item_openingfee_amount',
        'item_other_description',
        'party_title',
        'total_amount',
        'coffee_schedule_description',
        'extra_room_schedule_description',
        'item_lunch_amount',
        'item_happyhour_amount',
        'item_cleaning_amount',
        'student_amount',
        'participant_amount',
        'snack_amount',
        'transport_amount',
        'student_quantity',
        'participant_quantity',
        'snack_quantity',
        'transport_quantity',
        'is_custom',
        'is_scenography',
        'event_time',
        'product',
        'last_return_date',
        'event_type',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function monitorUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'monitor_user_id');
    }
}
