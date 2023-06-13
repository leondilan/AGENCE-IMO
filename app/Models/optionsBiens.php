<?php

namespace App\Models;

use Database\Factories\OptionsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class optionsBiens extends Model
{
    use HasFactory;

    protected $fillable = [
        'idBiens',
        'idOpt',
    ];

    protected static function newFactory()
    {
        return OptionsFactory::new();
    }
}
