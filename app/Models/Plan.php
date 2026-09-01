<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'duration_in_days',
        'description'
    ];

        protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }
    public function subscriptions(): HasMany
{
    return $this->hasMany(Subscription::class);
}
}
