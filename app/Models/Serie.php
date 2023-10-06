<?php

namespace App\Models;

use App\Models\Season;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Serie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * HasMany - 1 para Muitos
     * (Uma série possui várias temporadas)
     *
     * @return void
     */
    public function season()
    {
        return $this->hasMany(Season::class, 'series_id');
    }

    /**
     * Ordenando a busca quando o Eloquent usa o All
     *
     * @return void
     */
    public static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $queryBuilder) {
            $queryBuilder->orderBy('name', 'asc');
        });
    }
}