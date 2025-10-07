<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'label'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}