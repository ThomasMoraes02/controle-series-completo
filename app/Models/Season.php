<?php

namespace App\Models;

use App\Models\Series;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Season extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
    ];

    /**
     * belongsTo - Pertece a uma serie
     *
     * @return void
     */
    public function series()
    {
       return $this->belongsTo(Series::class); 
    }

    /**
     * hasMany - 1 para muitos
     * (Uma temporada tem vários episódios)
     *
     * @return void
     */
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
