<?php

namespace App\Models;

use Database\Factories\ImmoOptFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionsImmo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomOption',
    ];

    public function biens()
    {
        return $this->belongsToMany(BiensImmo::class);
    }

    protected static function newFactory()
    {
        return ImmoOptFactory::new();
    }
}
