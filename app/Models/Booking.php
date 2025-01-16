<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'room_id',
        'proposal_id',
        'branch_id',
        'rps_id',
        'user_id',
        'monitor_id',
        'participants',
        'amount',
        'due_date',
        'status',
        'language',
        'pagseguro_data',
        'paypal_data',
        'payment_method',
        'payment_date',
        'type',
        'paid_amount',
        'participant_quantity',
        'invoice_description',
        'invoice_number',
        'invoice_date',
        'nfe_status',
        'can_edit_invoice_number',
        'party_code',
        'party_title',
        'history',
        'is_email_issue_sent',
        'student_amount',
        'participant_amount',
        'snack_amount',
        'transport_amount',
        'student_quantity',
        'snack_quantity',
        'transport_quantity',
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
        'item_happyhour_amount',
        'item_cleaning_amount',
        'item_lunch_amount',
        'coffee_schedule_description',
        'extra_room_schedule_description',
        'is_custom',
        'is_scenography',
        'event_date',
        'event_start_time',
        'event_end_time',
        'product',
        'amount_to_pay',
        'is_giftcard',
        'discount_type',
    ];

    protected $casts = [
        'pagseguro_data' => 'array',
        'paypal_data' => 'array',
        'can_edit_invoice_number' => 'boolean',
        'is_email_issue_sent' => 'boolean',
        'is_custom' => 'boolean',
        'is_scenography' => 'boolean',
        'is_giftcard' => 'boolean',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function proposal(): BelongsTo
    {
        return $this->belongsTo(Proposal::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function rps(): BelongsTo
    {
        return $this->belongsTo(Rps::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function monitor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function coupon(): HasOne
    {
        return $this->hasOne(Coupon::class);
    }

    public function roomSchedules(): HasMany
    {
        return $this->hasMany(RoomSchedule::class);
    }
}
