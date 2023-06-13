<?php

namespace App\Models;

use Database\Factories\ImageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageImmo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomImage',
        'idBiens'
    ];

    public function biens()
    {
        return $this->belongsTo(BiensImmo::class,'idBiens');
    }

    protected static function newFactory()
    {
        return ImageFactory::new();
    }
}
