<?php

namespace App\Models;

use App\Models\ClassSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'class_schedule_id',
        'status',
        'checked_in_at',
    ];
    protected function casts():array{
        return [
            'checked_in_at'=>'datetime'
        ];
    }
    public function user() :BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function classSchedule() :BelongsTo{
        return $this->belongsTo(ClassSchedule::class);
    }

}
