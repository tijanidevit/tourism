<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DestinationVisit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected function casts(): array
    {
        return [
            'date_of_visit' => 'datetime',
        ];
    }


    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function destination() : BelongsTo {
        return $this->belongsTo(Destination::class);
    }
}
