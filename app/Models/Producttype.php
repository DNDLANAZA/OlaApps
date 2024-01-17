<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producttype extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    public function check()
    {
        return $this->hasOne(Check::class);
    }
}
