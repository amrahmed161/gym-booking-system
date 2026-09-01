<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GymClass extends Model
{
    /** @use HasFactory<\Database\Factories\GymClassFactory> */
    use HasFactory;

        protected $fillable = [
        'trainer_id',
        'name',
        'description',
        'capacity',
    ];

    public function trainer(): BelongsTo{
        return $this->belongsTo(Trainer::class);
    }
    public function classSchedules(): HasMany{
        return $this->hasMany(ClassSchedule::class);
    }
}
