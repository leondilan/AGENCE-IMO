<?php

namespace App\Models;

use Database\Factories\BienFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiensImmo extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'surface',
        'prix',
        'description',
        'piece',
        'chambre',
        'addresses',
        'ville',
        'idUser'
    ];

    public function images()
    {
        return $this->hasMany(ImageImmo::class);
    }

    public function options()
    {
        return $this->belongsToMany(OptionsImmo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'idUser');
    }

    protected static function newFactory()
    {
        return BienFactory::new();
    }
}
