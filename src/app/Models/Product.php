<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function getConditionLabelAttribute()
    {
        return $this->condition->label ?? '状態不明';
    }
}