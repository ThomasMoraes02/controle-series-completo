<?php

namespace App\Models;

use App\Models\Season;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'cover'
    ];

    protected $appends = [
        'links'
    ];

    /**
     * HasMany - 1 para Muitos
     * (Uma série possui várias temporadas)
     */
    public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id');
    }

    /**
     * Ordenando a busca quando o Eloquent usa o All
     */
    public static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $queryBuilder) {
            $queryBuilder->orderBy('name', 'asc');
        });
    }

    public function episodes()
    {
        return $this->hasManyThrough(Episode::class, Season::class);
    }

    public function links(): Attribute
    {
        return new Attribute(get: fn () => [
            [
                'rel' => 'self',
                'url' => "/api/v1/series/{$this->id}",
            ],
            [
                'rel' => 'seasons',
                'url' => "/api/v1/series/{$this->id}/seasons",
            ],
            [
                'rel' => 'episodes',
                'url' => "/api/v1/series/{$this->id}/episodes",
            ],
        ]);
    }
}