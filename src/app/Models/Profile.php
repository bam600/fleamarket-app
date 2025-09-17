<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/** */
class Profile extends Model
{
    use HasFactory;
    // 安全に代入できる変数：fillable
    protected $fillable = ['user_id', 'user_name', 'postal_code','address','building'];
}
