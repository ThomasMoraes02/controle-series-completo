<?php

namespace App\Models;

use App\Models\Season;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'cover'
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
}