<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DestinationRating extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function destination() : BelongsTo {
        return $this->belongsTo(Destination::class);
    }

    public function getShowRatingAttribute() : string {
        $rating = $this->rating;
        $maxRating = 5;

        return '' .
            implode('', array_map(function ($i) use ($rating, $maxRating) {
                return '<span class="mdi mdi-star' . ($i <= $rating ? '' : '-outline') . '"></span>';
            }, range(1, $maxRating)));
    }
}
