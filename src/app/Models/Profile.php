<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/** */
class Profile extends Model
{
    use HasFactory;

    // $fillableで安全に代入できるカラムを明示。これがないとcreate() は使えない。
    protected $fillable = ['user_id', 'user_name', 'postal_code','address','building'];
}
