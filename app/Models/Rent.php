<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'from',
        'to',
        'Sportsground_idSportsground',
        'Customer_idCustomer',
        'price',
    ];

    public function sportsground(): BelongsTo {
        return $this->belongsTo(Sportsground::class);
    }


    public function customer(): BelongsTo {
        return $this->belongsTo(Customer::class);
    }
}
