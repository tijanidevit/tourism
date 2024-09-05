<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DestinationSpot extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function destination() : BelongsTo {
        return $this->belongsTo(Destination::class);
    }
}
