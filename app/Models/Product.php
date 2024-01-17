<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','quantite', 'datecreation','fichier','fournisseur','unite'];

    public function producttype()
    {
        return $this->belongsTo(Producttype::class, 'name');
    }
}
