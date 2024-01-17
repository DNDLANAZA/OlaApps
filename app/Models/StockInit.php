<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockInit extends Model
{
    use HasFactory;

    protected $fillable = ['gaz','gazoil', 'lubrifiant', 'petrole', 'super'];
}
