<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $attributes = [
        'rating' => 0,
        'visit' => 0,
    ];

    public function ratings() : HasMany {
        return $this->hasMany(DestinationRating::class);
    }

    public function spots() : HasMany {
        return $this->hasMany(DestinationSpot::class);
    }

    public function visits() : HasMany {
        return $this->hasMany(DestinationVisit::class);
    }

    public function latestRatings() : HasMany {
        return $this->hasMany(DestinationRating::class)->latest()->take(5);
    }

    public function getShowImageAttribute() : string {
        return $this->image ?? '/assets/images/properties/2.jpg';
    }

    public function getShowRatingAttribute() : string {
        $rating = $this->rating;
        $maxRating = 5;

        return '' .
            implode('', array_map(function ($i) use ($rating, $maxRating) {
                return '<span class="mdi mdi-star' . ($i <= $rating ? '' : '-outline') . '"></span>';
            }, range(1, $maxRating)));
    }

    public function getDescriptionExcerptAttribute() : string {
        $cleanContent = strip_tags($this->description);
        return mb_strimwidth($cleanContent, 0, 150, '...');
    }
}
